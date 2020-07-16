<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    public $publicData = [
        'backendTemplates' => 'backend/templates/public/'
    ];

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $user = $this->M_user->getUser(['user_email' => $this->session->userdata('primerental')['user_email']])->row_array();
        $data = [
            'title' => 'Data General Users',
            'user' => $user,
        ];

        $backendTemplates = $this->publicData['backendTemplates'];
        $viewsDashboardPath = 'backend/dashboard/';
        $this->load->view($backendTemplates . 'header', $data);
        $this->load->view($backendTemplates . 'topbar', $data);
        $this->load->view($backendTemplates . 'sidebar', $data);
        $this->load->view($viewsDashboardPath . 'users/general/v_general', $data); //main content
        $this->load->view($backendTemplates . 'footer', $data);
        $this->load->view($viewsDashboardPath . '/plugins/_users', $data); //plugins
        $this->load->view($backendTemplates . 'script', $data);
        // costum js
        $this->load->view($viewsDashboardPath . 'users/js/js_general', $data);
        $this->load->view($backendTemplates . 'end', $data);
    }

    public function generalUser()
    {
        $users = $this->M_user->getGeneralUsers();
        foreach ($users as $user) {
            $row[] = $user;
            $user->user_created = date('d-F-Y', $user->user_created);
        }

        $data['users'] = $row;


        echo json_encode($data);
    }

    public function getUser()
    {
        $user_id = $this->uri->segment(4);
        $data = [
            'user' => $this->M_user->getUserWhere([
                'user_id' => $user_id,
            ])->row_array(),
            'level' => $this->M_public->getData('user_level')->result_array(),
        ];


        echo json_encode($data);
    }

    public function administrators()
    {
        $user = $this->M_user->getUser(['user_email' => $this->session->userdata('primerental')['user_email']])->row_array();
        $data = [
            'title' => 'Data Administrator',
            'user' => $user,
        ];
        $backendTemplates = $this->publicData['backendTemplates'];
        $viewsDashboardPath = 'backend/dashboard/';
        $this->load->view($backendTemplates . 'header', $data);
        $this->load->view($backendTemplates . 'topbar', $data);
        $this->load->view($backendTemplates . 'sidebar', $data);
        $this->load->view($viewsDashboardPath . 'users/admin/v_admin', $data); //main content
        $this->load->view($backendTemplates . 'footer', $data);
        $this->load->view($viewsDashboardPath . '/plugins/_users', $data); //plugins
        $this->load->view($backendTemplates . 'script', $data);
        // costum js
        $this->load->view($viewsDashboardPath . 'users/js/js_admin', $data);
        $this->load->view($backendTemplates . 'end', $data);
    }

    public function insertAdmin()
    {
        $admin_name = $this->input->post('admin_name');
        $user_name = $this->input->post('user_name', true);
        $user_email = $this->input->post('user_email', true);
        $admin_phone = $this->input->post('admin_phone');
        $admin_address = $this->input->post('admin_address');
        $admin_birth = $this->input->post('admin_birth');
        $admin_gender = $this->input->post('admin_gender');

        $dataUser = [
            'user_id' => getAutoNumber('user', 'user_id', 'user-', 9),
            'user_name' => htmlspecialchars($user_name),
            'user_email' => htmlspecialchars($user_email),
            'user_photo' => 'default.png',
            'user_password' => password_hash($this->input->post('user_password'), PASSWORD_DEFAULT),
            'user_status' => 'online',
            'user_level' => 4,
            'user_is_activation' => 1,
            'user_created' => time()
        ];

        $dataAdmin = [
            'admin_id' => getAutoNumber('admin', 'admin_id', 'admin-', 8),
            'admin_user_id' => $dataUser['user_id'],
            "admin_name" => $admin_name,
            "admin_phone" => $admin_phone,
            "admin_address" => $admin_address,
            "admin_birth" => $admin_birth,
            "admin_gender" => $admin_gender,
            "admin_created" => time(),
        ];

        $cekdata = $this->db->get_where('user', ['user_email' => $user_email]);

        if ($cekdata->num_rows() == 1) {
            set_frontflashmessage("error", "Gagal!", "Email yang dimasukan sudah tersedia!");
            redirect('administrator/users/admin');
        } else {
            $this->M_public->insertData('user', $dataUser);
            $this->M_public->insertData('admin', $dataAdmin);
            set_frontflashmessage("success", "Berhasil menambah data!", "Anda baru saja menambahkan data admin baru!");
            redirect('administrator/users/admin');
        }
    }

    public function getAdminUser()
    {
        $admin = $this->M_user->getAdminUsers()->result_array();
        foreach ($admin as $a) {
            if ($a['user_level'] != 1) {
                $a['user_created'] = date('d-F-Y', $a['user_created']);
                $row[] = $a;
                $status = true;
            } else {
                $status = false;
            }
        }

        // $data['users'] = $row;
        // var_dump($row);
        // die();
        $data['admin'] = $row;
        $data['status'] = $status;


        echo json_encode($data);
    }

    public function getAdminWhere()
    {
        $user_id = $this->uri->segment(4);

        $data = $this->M_user->getAdminWhere(['user_id' => $user_id])->row_array();

        $data['user_created'] =  date('d-F-Y', $data['user_created']);
        $data['user_photo'] =   base_url('assets/uploads/ava/') . $data['user_photo'];

        echo json_encode($data);
    }

    public function changeUserToAdmin()
    {
        $user_id = $this->uri->segment(4);

        $user = $this->M_user->getUser(['user_id' => $user_id])->row_array();

        $datauser = [
            'user_level' => 4,
        ];
        $admin_id = getAutoNumber('admin', 'admin_id', 'admin-', 8);
        $dataAdmin = [
            'admin_id' => $admin_id,
            'admin_user_id' => $user['user_id'],
            "admin_name" => $admin_id,
            "admin_phone" => "080000000000",
            "admin_address" => "unknown",
            "admin_birth" => "2001-01-11",
            "admin_gender" => "unknown",
            "admin_created" => time(),
        ];

        $this->M_public->insertData('admin', $dataAdmin);
        $this->M_public->updateData(['user_id' => $user_id], 'user', $datauser);
        set_frontflashmessage("success", "Berhasil menambah data!", $user['user_name'] . " Telah Dijadikan Admin!");
        redirect('administrator/users/admin');
    }

    public function clients()
    {
        $user = $this->M_user->getUser(['user_email' => $this->session->userdata('primerental')['user_email']])->row_array();
        $data = [
            'title' => 'Data Clients',
            'user' => $user,
        ];

        $backendTemplates = $this->publicData['backendTemplates'];
        $viewsDashboardPath = 'backend/dashboard/';
        $this->load->view($backendTemplates . 'header', $data);
        $this->load->view($backendTemplates . 'topbar', $data);
        $this->load->view($backendTemplates . 'sidebar', $data);
        $this->load->view($viewsDashboardPath . 'users/clients/v_clients', $data); //main content
        $this->load->view($backendTemplates . 'footer', $data);
        $this->load->view($viewsDashboardPath . '/plugins/_users', $data); //plugins
        $this->load->view($backendTemplates . 'script', $data);
        // costum js
        $this->load->view($viewsDashboardPath . 'users/js/js_clients', $data);
        $this->load->view($backendTemplates . 'end', $data);
    }
    public function getClients()
    {
        $cliens = $this->M_clients->getClients()->result();
        foreach ($cliens as $c) {
            $c->user_created = date('d-F-Y', $c->user_created);
            $row[] = $c;
        }

        $data['clients'] = $row;

        echo json_encode($data);
    }

    public function getClientWhere()
    {

        $client_id = $this->uri->segment(4);

        $res = $this->M_clients->checkClient(['client_id' => $client_id])->row_array();

        $res['user_created'] =  date('d-F-Y', $res['user_created']);
        // $data['id'] = $client_id;

        $transactions = $this->M_trans->getTransactionsWithPayment(['rent_client_id' => $client_id])->result_array();

        foreach ($transactions as $tr) {
            $tr['payment_total'] = number_format($tr['payment_total'], 0, ',', '.');
            $tr['rent_date'] = date("d/m/Y", strtotime($tr['rent_date']));
            $row[] = $tr;
        }

        $data['client'] = $res;
        $data['transaction'] = $row;

        echo json_encode($data);
    }


    public function deleteCostumer()
    {

        $cos_id = $this->uri->segment(4);


        $data['result'] = $this->M_public->deleteData(['cos_id' => $cos_id], 'costumer');

        echo json_encode($data);
    }
}
