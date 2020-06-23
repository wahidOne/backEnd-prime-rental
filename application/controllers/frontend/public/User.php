<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public $public = [
        "templates" => "frontEnd/templates/user/",
        "pages" => "frontEnd/pages/user/"

    ];

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('primerental_user')) {
            redirect('autentifikasi/login');
        }
    }


    public function index()
    {
        if ($this->session->userdata('primerental_user') != NULL) {
            $user = $this->M_user->getUser(['user_email' => $this->session->userdata('primerental_user')['user_email']]);
            if ($user->num_rows() > 0) {
                $user = $user->row_array();
                $userLevel = preg_replace('/\s+/', '', $user['level']);

                $costumer = $this->M_costumer->cekCostumer(['cos_user_id' => $user['user_id']]);

                if ($userLevel == "superadmin" || $userLevel == "admin") {
                    $profile = $this->M_user->getAdmin(['admin_user_id' => $user['user_id']])->row_array();
                } else if ($costumer->num_rows() > 0) {
                    $profile = $costumer->row_array();
                } else {
                    $profile = $user;
                }

                $data['user'] = $user;
                $data['profile'] = $profile;
            } else {
                $data['user'] = [];
                $data['costumer'] = [];
            }
        }


        $data['title'] =   $user['user_name'];

        $templatesPath  = $this->public['templates'];
        $views  = $this->public['pages'];

        $data['componentPath'] = $views . "components/";


        $this->load->view($templatesPath .  "header", $data);
        $this->load->view($templatesPath .  "sidebar", $data);
        $this->load->view($templatesPath .  "topbar", $data);
        if ($userLevel == "superadmin" || $userLevel == "admin") {
            $this->load->view($views .  "admin-profile", $data);
        } else if ($costumer->num_rows() > 0) {
            $this->load->view($views .  "customer-profile", $data);
        } else if (!$costumer->num_rows() > 0) {
            $this->load->view($views .  "default-profile", $data);
        }

        $this->load->view($templatesPath .  "end", $data);
    }
}
