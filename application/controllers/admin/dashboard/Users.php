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
        $user = $this->M_user->getUser(['user_email' => $this->session->userdata('user_email')])->row_array();
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

        $data = [
            'user_id' => $this->input->post('user_id'),
            'user_level' => $this->input->post('user_level')
        ];

        $this->M_public->updateData(['user_id ' => $user_id], 'user', $data);

        if ($data) {
            $res['status'] = "Berhasil";
            $res['message'] = "Berhasil mengubah level user";
        }

        $data['response'] = $res;

        echo json_encode($data);
    }

    public function administrators()
    {
        $user = $this->M_user->getUser(['user_email' => $this->session->userdata('user_email')])->row_array();
        $data = [
            'title' => 'Data General Users',
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
            $a->user_created = date('d-F-Y', $a->user_created);
            $row[] = $a;
        }

        $data['users'] = $row;
        // $data['users'] = $users;


        echo json_encode($data);
    }
}
