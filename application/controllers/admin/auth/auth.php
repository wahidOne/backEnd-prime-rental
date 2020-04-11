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
        $data['title'] = 'Login ';

        $this->form_validation->set_rules(
            'email',
            'Alamat Email',
            'required|trim|valid_email',
            [
                'required' => '<span class="text-danger m-1 ml-lg-30 pesan-validasi-input" >Email harus diisi!! </span>',
                'valid_email' => 'Email Tidak Benar!! '
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim',
            [
                'required' => '<span class="text-danger m-1 pesan-validasi-input" >Masukan passowrd anda!! </span>'
            ]
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/templates/auth/auth-admin-header', $data);
            $this->load->view('admin/auth/login', $data);
            $this->load->view('admin/templates/auth/auth-admin-footer', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['user_email' => $email])->row_array();
        // jika usernya ada
        if ($user) {
            // jika usernya aktif
            if ($user['user_status'] == 1) {
                // cek password
                if ($password === $user['user_password']) {
                    // if (password_verify($password, $user['password'])) {
                    $data = [
                        'user_email' => $user['user_email'],
                        'user_level' => $user['user_level']
                    ];
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('pesan');

                    if ($user['user_level'] <= 1) {
                        echo $user['user_name'];
                        die();
                        redirect('administrator');
                    } else {
                        $this->session->set_flashdata('pesan-blok', '
                            Email yang dimasukan bukan email administrator !
                        ');
                        redirect('admin/auth/auth');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Passwordnya Yang Anda Masukan Salah!!');
                    redirect('administrator/login');
                }
            } else {
                $this->session->set_flashdata('error', '
                Email yang dimasukan belum belum aktifasi!');
                redirect('administrator/login');
            }
        } else {
            $this->session->set_flashdata('error', '
                Email Belum Terdaftar!!
            ');
            redirect('administrator/login');
        }
    }



    public function registration()
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
            $data['title'] = 'Login ';
            $this->load->view('admin/templates/auth/auth-admin-header', $data);
            $this->load->view('admin/auth/registration', $data);
            $this->load->view('admin/templates/auth/auth-admin-footer', $data);
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 3,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('pesan', ' Akun anda telah dibuat. Silahkan masuk!');
            redirect('auth');
        }
    }
}
