<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FrontAuth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_user', 'm_user');
    }


    public function index()
    {

        $data['title'] = 'Login ';

        $this->form_validation->set_rules(
            'email',
            'Alamat Email',
            'required|trim|valid_email',
            [
                'required' => 'Email harus diisi!!',
                'valid_email' => 'Email Tidak Benar!! '
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim',
            [
                'required' => 'Masukan password anda!!'
            ]
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('frontEnd/templates/auth/header', $data);
            $this->load->view('frontEnd/templates/public/sidebar', $data);
            $this->load->view('frontEnd/pages/auth/login', $data);
            $this->load->view('frontEnd/templates/auth/footer', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->m_user->getUser(['user_email' => $email])->row_array();

        // jika usernya ada
        if ($user) {
            // jika usernya aktif
            if ($user['user_is_activation'] == 1) {
                if (password_verify($password, $user['user_password'])) {
                    $userSession = [
                        'user_email' => $user['user_email'],
                        'user_level' => $user['user_level']
                    ];

                    $data = [
                        'primerental_user' => $userSession
                    ];

                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('auth-success', 'Login Berhasil!');
                    redirect('beranda');
                } else {
                    $this->session->set_flashdata('auth-error', 'Passwordnya Yang Anda Masukan Salah!!');
                    redirect('autentifikasi/login');
                }
            } else {
                $this->session->set_flashdata('auth-error', '
                Email yang dimasukan belum belum aktifasi!');
                redirect('autentifikasi/login');
            }
        } else {
            $this->session->set_flashdata('auth-error', '
            Email Belum Terdaftar!!
        ');
            redirect('autentifikasi/login');
        }
    }



    public function logout()
    {
        $this->session->unset_userdata('primerental_user')['user_email'];
        $this->session->unset_userdata('primerental_user')['user_level'];

        $this->session->set_flashdata('auth-success', 'Logout berhasil, Sampai jumpa lagi');
        redirect('autentifikasi/login');
    }
}
