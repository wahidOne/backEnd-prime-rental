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
        } else {
            $this->session->set_flashdata('auth-info', 'Silahkan login terlebih dahulu! untuk mengakses halamannya');
            redirect('autentifikasi/login');
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


    public function uploadImage()
    {

        $user_id = $this->input->post('user_id');

        $user = $this->M_user->getUser(['user_email' => $user_id])->row_array();

        $old_image = $this->input->post('old_user_photo');

        $upload_image = $_FILES['user_photo']['name'];

        if ($upload_image) {
            $config['upload_path']          = './assets/uploads/ava/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['file_name']            = 'ava-' . time();
            $config['overwrite']            = true;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('user_photo')) {
                $gambar_lama = $old_image;
                if ($gambar_lama != 'default.png') {
                    unlink(FCPATH . './assets/uploads/ava/' . $gambar_lama);
                }

                $gambar_baru = $this->upload->data('file_name');
                $this->db->set('user_photo', $gambar_baru);
            } else {
                redirect('profile');
            }
        }

        $this->db->where('user_id', $user_id);
        $this->db->update('user');

        $this->session->set_flashdata('upload-success', 'Upload Gambar Berhasil');
        redirect('profile');
    }

    public function updateProfile()
    {
        $user_id = $this->input->post('user_id');
        $user_name = $this->input->post('user_name');

        $dataUser = [
            'user_name' => $user_name,
        ];
        $costumer = $this->M_costumer->cekCostumer(['cos_user_id' => $user_id]);
        $this->M_public->updateData(['user_id' => $user_id], 'user', $dataUser);
        if ($costumer->num_rows() <= 0) {
            $dataCustomer = [
                'cos_name' => $this->input->post('fullname'),
                'cos_address' => $this->input->post('alamat'),
                'cos_ID_num' => $this->input->post('no_ktp'),
                'cos_phone' => $this->input->post('no_hp'),
                'cos_user_id' => $user_id,
            ];
            $this->M_public->insertData('costumer', $dataCustomer);
            redirect('profile');
        } else {
            $dataCustomer = [
                'cos_name' => $this->input->post('fullname'),
                'cos_address' => $this->input->post('alamat'),
                'cos_ID_num' => $this->input->post('no_ktp'),
                'cos_phone' => $this->input->post('no_hp'),
            ];



            var_dump($dataCustomer, $user_id);
            $this->M_public->updateData(['cos_user_id' => $user_id], 'costumer', $dataCustomer);
            redirect('profile');
        }
    }
}
