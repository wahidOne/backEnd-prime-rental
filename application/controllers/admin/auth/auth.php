<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_user');
    }

    public function index()
    {
        $data['title'] = 'Sign Up ';

        $this->form_validation->set_rules(
            'email',
            'Alamat Email',
            'required|trim|valid_email',
            [
                'required' => '<span class="text-danger mt-3 ml-2 pesan-validasi-input mb-n2 " >Email harus diisi!! </span>',
                'valid_email' => 'Email Tidak Benar!! '
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim',
            [
                'required' => '<span class="text-danger mt-3 mb-0 ml-2 pesan-validasi-input" >Masukan password anda!! </span>'
            ]
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/templates/auth/header', $data);
            $this->load->view('backend/auth/sign-in', $data);
            $this->load->view('backend/templates/auth/footer', $data);
        } else {
            $this->_signIn();
        }
    }

    private function _signIn()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['user_email' => $email])->row_array();
        // jika usernya ada
        if ($user) {
            // jika usernya aktif
            if ($user['user_is_activation'] == 1) {
                // cek password
                if (password_verify($password, $user['user_password'])) {
                    $data = [
                        'user_email' => $user['user_email'],
                        'user_level' => $user['user_level']
                    ];
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('pesan');

                    if ($user['user_level'] <= 2) {
                        $this->session->set_flashdata('toastrBerhasilLogin', "Selamat datang " . $user['user_name']);
                        redirect('administrator/dashboard/');
                    } else {
                        $this->session->set_flashdata('pesan-blok', '
                            Email yang dimasukan bukan email administrator !
                        ');
                        redirect('administrator/sign-in');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Passwordnya Yang Anda Masukan Salah!!');
                    redirect('administrator/sign-in');
                }
            } else {
                $this->session->set_flashdata('error', '
                Email yang dimasukan belum belum aktifasi!');
                redirect('administrator/sign-in');
            }
        } else {
            $this->session->set_flashdata('error', '
                Email Belum Terdaftar!!
            ');
            redirect('administrator/sign-in');
        }
    }



    public function signUp()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
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


        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Sign Up';
            $this->load->view('backend/templates/auth/header', $data);
            $this->load->view('backend/auth/sign-up', $data);
            $this->load->view('backend/templates/auth/footer', $data);
        } else {
            $data = [
                'user_name' => htmlspecialchars($this->input->post('name', true)),
                'user_email' => htmlspecialchars($this->input->post('email', true)),
                'user_photo' => 'default.jpg',
                'user_password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'user_status' => 'online',
                'user_level' => 3,
                'user_is_activation' => 1,
                'user_created' => time()
            ];

            $this->M_user->insertData($data);
            $this->session->set_flashdata('pesan_registrasi', 'Akun anda telah dibuat. Silahkan masuk!');
            redirect('administrator/sign-in');
        }
    }

    public function signOut()
    {
        $this->session->unset_userdata('user_email');
        $this->session->unset_userdata('user_level');

        $this->session->set_flashdata('pesan-signOut', ' Sampai Jumpa Lagi');
        redirect('administrator/sign-in');
    }
}
