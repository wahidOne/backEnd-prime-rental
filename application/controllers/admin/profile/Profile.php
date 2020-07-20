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
            'user' => $this->M_user->getAdmin(['user_email' => $this->session->userdata('primerental')['user_email']])->row_array(),
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
            'user' => $this->M_user->getAdmin(['user_email' => $this->session->userdata('primerental')['user_email']])->row_array(),
        ];
        $this->M_user->update();
        // $this->db->set('image', $new_image);

        $this->session->set_flashdata('success-profile', 'Profil berhasil diupdate!');
        redirect('administrator/profile');
    }

    public function changePassword()
    {

        // $current_passwrod = $this->input->post('');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');

        $post_data = json_decode(file_get_contents('php://input'), true);

        foreach ($post_data as $key => $val) {
            $val = filter_var($val, FILTER_SANITIZE_STRING); // Remove all HTML tags from string
            $post_data[$key] = $val;
        }

        $user_id = $post_data['user_id'];

        $user = $this->M_user->getUser(['user_id' => $user_id])->row_array();
        $current_password = $post_data['current_password'];
        $new_password = $post_data['new_password'];

        if (!password_verify($current_password, $user['user_password'])) {

            $status = false;
            $message = "Password Terkini salah";
        } else {
            if ($current_password == $new_password) {
                $status = false;
                $message = "Password terbaru tidak boleh sama dengan yang lama!";
            } else {
                $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                $data['password'] = $new_password_hash;

                $this->db->set('user_password', $new_password_hash);
                $this->db->where('user_email', $user['user_email']);
                $this->db->update('user');

                $status = true;
                $message = "Berhasil mengganti password ";
            }
        }

        $data['status'] = $status;
        $data['message'] = $message;

        echo json_encode($data);
    }
}
