<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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


        $data = [
            'title' => 'Dashboard',
            'user' => $this->M_user->getUser(['user_email' => $this->session->userdata('user_email')])->row_array()
        ];


        $backendTemplates = $this->publicData['backendTemplates'];

        $viewsDashboardPath = 'backend/dashboard/';

        $data['path']  = $viewsDashboardPath;

        $this->load->view($backendTemplates . 'header', $data);
        $this->load->view($backendTemplates . 'topbar', $data);
        $this->load->view($backendTemplates . 'sidebar', $data);
        $this->load->view($viewsDashboardPath . 'v_dashboard', $data); //main content
        $this->load->view($backendTemplates . 'footer', $data);
        $this->load->view($viewsDashboardPath . '/plugins/_dashboard', $data); //plugins
        $this->load->view($backendTemplates . 'script', $data);
        $this->load->view($backendTemplates . 'end', $data);
    }
}
