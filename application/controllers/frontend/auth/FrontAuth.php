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



    public function registrasi()
    {

        $userSession = $this->session->userdata('primerental_user');
        if ($userSession != NULL) {
            if ($userSession['user_email']) {
                redirect('beranda');
            }
        }



        $this->form_validation->set_rules('name', 'Name', 'required|trim', [
            'required' => 'Username harus di isi!',
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.user_email]', [
            'required' => 'Email harus diisi!',
            'is_unique' => "Email yang di masukan sudah terdaftar!"
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'required' => 'Masukan kata sandi anda! ',
            'matches' => ' Kata sandi tidak sama !',
            'min_length' => ' Kata sandi terlalu pendek ! '
        ]);


        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]', [
            'required' => 'Ulangi Kata Sandi!'
        ]);

        $data['title'] = 'Registrasi ';

        if ($this->form_validation->run() == false) {

            $this->load->view('frontEnd/templates/auth/header', $data);
            $this->load->view('frontEnd/templates/public/sidebar', $data);
            $this->load->view('frontEnd/pages/auth/register', $data);
            $this->load->view('frontEnd/templates/auth/footer', $data);
        } else {
            $data = [
                'user_name' => htmlspecialchars($this->input->post('name', true)),
                'user_email' => htmlspecialchars($this->input->post('email', true)),
                'user_photo' => 'default.png',
                'user_password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'user_status' => 'online',
                'user_level' => 3,
                'user_is_activation' => 1,
                'user_created' => time()
            ];

            $this->M_user->insertData($data);
            $this->session->set_flashdata('register-success', 'Akun anda telah dibuat. Silahkan masuk!');
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
