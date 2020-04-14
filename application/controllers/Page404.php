<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page404 extends CI_Controller
{



    public function index()
    {

        $data['user'] = $this->M_user->getUser(['user_email' => $this->session->userdata('user_email')])->row_array();

        $data['title'] = 'Page Not Found';

        $this->load->view('backend/templates/auth/header', $data);
        $this->load->view('backend/auth/404', $data);
        $this->load->view('backend/templates/auth/footer', $data);
    }
}
