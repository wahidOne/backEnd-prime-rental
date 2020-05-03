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
            'user' => $this->M_user->getUserWhere(['user_id' => $user_id])->row_array(),
            'level' => $this->M_public->getData('user_level')->result_array()
        ];


        echo json_encode($data);
    }


    public function changeLevel()
    {
        // $user_id = $this->uri->segment(4);

        $user_id = $this->input->post('user_id');
        $user_level = $this->input->post('user_level');
        $old_user_level = $this->input->post('old_level');


        $dataupdate = [
            'user_id' => $user_id,
            'user_level' => $user_level
        ];

        $user = $this->db->get_where('user', ['user_id' => $user_id])->row_array();


        if ($user_level == 4 || $old_user_level = 4) {
            $cekdata = $this->db->get_where('admin', ['admin_user_id' => $user_id]);
        } elseif ($user_level == 7) {
            $cekdata = $this->db->get_where('drivers', ['driver_user_id' => $user_id]);
        }

        if ($cekdata->num_rows() < 1) {
            if ($user_level == "4") {
                $admin = [
                    'admin_name' => $user['user_name'],
                    'admin_user_id' => $user_id,
                    'admin_address' => '-',
                    'admin_phone' => '-',
                    'admin_birth' => '-',
                    'admin_gender' => '-',
                ];
                $this->M_public->insertData('admin', $admin);
                $this->M_public->updateData(['user_id ' => $user_id], 'user', $dataupdate);
                $data['admin'] = $admin;
            } else if ($user_level == "7") {
                $driver = [
                    'driver_name' => $user['user_name'],
                    'driver_phone' => '0000-0000-0000',
                    'driver_user_id' => $user_id,
                    'driver_ID_number' => "-",
                    'driver_status' => "Bebas",
                ];
                $this->M_public->insertData('drivers', $driver);
                $this->M_public->updateData(['user_id ' => $user_id], 'user', $dataupdate);
                $data['driver'] = $driver;
            }
        } else {

            // $res['debug'] = $cekAdmin;
            if ($old_user_level = 4) {
                if ($user_level != 4) {
                    $this->db->delete('admin', ['admin_user_id' => $user_id]);
                    $this->M_public->updateData(['user_id ' => $user_id], 'user', $dataupdate);
                }
            }
        }




        if ($data) {
            $res['status'] = "Berhasil";
            $res['message'] = "Berhasil mengubah level user";
        }

        $data['response'] = $res;


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




    public function getAdminUser()
    {
        $admin = $this->M_user->getAdminUsers();
        foreach ($admin as $a) {
            if ($a->user_level != 1) {
                $a->user_created = date('d-F-Y', $a->user_created);
                $row[] = $a;
            }
        }

        $data['users'] = $row;
        // $data['users'] = $users;


        echo json_encode($data);
    }


    public function drivers()
    {
        $user = $this->M_user->getUser(['user_email' => $this->session->userdata('primerental')['user_email']])->row_array();
        $data = [
            'title' => 'Data Drivers',
            'user' => $user,
        ];

        $backendTemplates = $this->publicData['backendTemplates'];
        $viewsDashboardPath = 'backend/dashboard/';
        $this->load->view($backendTemplates . 'header', $data);
        $this->load->view($backendTemplates . 'topbar', $data);
        $this->load->view($backendTemplates . 'sidebar', $data);
        $this->load->view($viewsDashboardPath . 'users/drivers/v_drivers', $data); //main content
        $this->load->view($backendTemplates . 'footer', $data);
        $this->load->view($viewsDashboardPath . '/plugins/_users', $data); //plugins
        $this->load->view($backendTemplates . 'script', $data);
        // costum js
        $this->load->view($viewsDashboardPath . 'users/js/js_drivers', $data);
        $this->load->view($backendTemplates . 'end', $data);
    }


    public function getDrivers()
    {
        $drivers = $this->M_user->getDrivers();
        foreach ($drivers as $drive) {
            $drive->user_created = date('d-F-Y', $drive->user_created);
            $row[] = $drive;
        }

        $data['driver'] = $row;

        echo json_encode($data);
    }

    public function getDriversWhere()
    {

        $user_id = $this->uri->segment(4);

        $data = $this->M_user->getDriversWhere(['user_id' => $user_id])->row_array();

        $data['user_created'] =  date('d-F-Y', $data['user_created']);

        echo json_encode($data);
    }

    public function deleteDriver()
    {

        $user_id = $this->uri->segment(4);

        $driver = [
            'user_id' => $user_id,
            'user_level' => 3
        ];

        $result = $this->M_public->updateData(['user_id ' => $user_id], 'user', $driver);

        if ($result > 0) {
            $this->M_public->deleteData(['driver_user_id' => $user_id], 'drivers');
            $data['message'] = "Berhasil menghapus driver!";
        }
        echo json_encode($data);
    }
}
