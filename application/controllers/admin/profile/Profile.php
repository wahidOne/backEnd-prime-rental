<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
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
            'title' => 'User profile',
            'user' => $this->M_user->getAdmin(['user_email' => $this->session->userdata('user_email')])->row_array(),
        ];



        $backendTemplates = $this->publicData['backendTemplates'];

        $viewsProfilePath = 'backend/profile/';

        $data['path']  = $viewsProfilePath;

        $this->load->view($backendTemplates . 'header', $data);
        $this->load->view($backendTemplates . 'topbar', $data);
        $this->load->view($backendTemplates . 'sidebar', $data);
        $this->load->view($viewsProfilePath . '/v_admin-profile', $data); //main content
        $this->load->view($backendTemplates . 'footer', $data);
        $this->load->view($viewsProfilePath . '/plugins/_admin-profile', $data); //plugins
        $this->load->view($backendTemplates . 'script', $data);
        // costum js
        $this->load->view($viewsProfilePath . '/js/_js_profile', $data);
        $this->load->view($backendTemplates . 'end', $data);
    }

    public function updateProfile()
    {

        $data = [
            'user' => $this->M_user->getAdmin(['user_email' => $this->session->userdata('user_email')])->row_array(),
        ];
        $this->M_user->update();
        // $this->db->set('image', $new_image);

        $this->session->set_flashdata('success-profile', 'Profil berhasil diupdate!');
        redirect('administrator/profile');
    }
}
