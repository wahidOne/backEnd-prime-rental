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

    public function getAdminWhere()
    {
        $user_id = $this->uri->segment(4);

        $data = $this->M_user->getAdminWhere(['user_id' => $user_id])->row_array();

        $data['user_created'] =  date('d-F-Y', $data['user_created']);
        $data['user_photo'] =   base_url('assets/uploads/ava/') . $data['user_photo'];

        echo json_encode($data);
    }

    public function customers()
    {
        $user = $this->M_user->getUser(['user_email' => $this->session->userdata('primerental')['user_email']])->row_array();
        $data = [
            'title' => 'Data Kostumer',
            'user' => $user,
        ];

        $backendTemplates = $this->publicData['backendTemplates'];
        $viewsDashboardPath = 'backend/dashboard/';
        $this->load->view($backendTemplates . 'header', $data);
        $this->load->view($backendTemplates . 'topbar', $data);
        $this->load->view($backendTemplates . 'sidebar', $data);
        $this->load->view($viewsDashboardPath . 'users/costumers/v_costumer', $data); //main content
        $this->load->view($backendTemplates . 'footer', $data);
        $this->load->view($viewsDashboardPath . '/plugins/_users', $data); //plugins
        $this->load->view($backendTemplates . 'script', $data);
        // costum js
        $this->load->view($viewsDashboardPath . 'users/js/js_costumer', $data);
        $this->load->view($backendTemplates . 'end', $data);
    }

    public function getCustomers()
    {
        $customer = $this->M_costumer->getCustomers()->result();
        foreach ($customer as $cus) {
            $cus->user_created = date('d-F-Y', $cus->user_created);
            $row[] = $cus;
        }

        $data['costumers'] = $row;

        echo json_encode($data);
    }

    public function getCustomersWhere()
    {

        $cos_id = $this->uri->segment(4);

        $data = $this->M_costumer->cekCostumer(['cos_id' => $cos_id])->row_array();

        $data['user_created'] =  date('d-F-Y', $data['user_created']);

        echo json_encode($data);
    }


    public function deleteCostumer()
    {

        $cos_id = $this->uri->segment(4);


        $data['result'] = $this->M_public->deleteData(['cos_id' => $cos_id], 'costumer');

        echo json_encode($data);
    }
}
