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


        $tenLatest = $this->M_trans->getLastTransactions(10, 'rent_date')->result_array();
        $new_user = $this->M_user->getNewUsers(5, 'user_created', ['level' => 'user'])->result();

        $data = [
            'title' => 'Dashboard',
            'user' => $this->M_user->getUser(['user_email' => $this->session->userdata('primerental')['user_email']])->row_array(),
            'new_user' => $new_user,
            'tenLatestTransactions' => $tenLatest
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
