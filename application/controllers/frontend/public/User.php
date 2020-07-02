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

                $client = $this->M_clients->checkClient(['client_user_id' => $user['user_id']]);

                if ($userLevel == "superadmin" || $userLevel == "admin") {
                    $profile = $this->M_user->getAdmin(['admin_user_id' => $user['user_id']])->row_array();
                } else if ($client->num_rows() > 0) {
                    $profile = $client->row_array();
                } else {
                    $profile = $user;
                }

                $data['user'] = $user;
                $data['profile'] = $profile;
            } else {
                $data['user'] = [];
                $data['profile'] = [];
            }
        } else {
            $this->session->set_flashdata('auth-info', 'Silahkan login terlebih dahulu! untuk mengakses halamannya');
            redirect('autentifikasi/login');
        }


        $data['title'] = "Profile";

        $templatesPath  = $this->public['templates'];
        $views  = $this->public['pages'];

        $data['componentPath'] = $views . "components/";


        $this->load->view($templatesPath .  "header", $data);
        $this->load->view($templatesPath .  "sidebar", $data);
        $this->load->view($templatesPath .  "topbar", $data);
        if ($userLevel == "superadmin" || $userLevel == "admin") {
            $this->load->view($views .  "admin-profile", $data);
        } else if ($client->num_rows() > 0) {
            $this->load->view($views .  "customer-profile", $data);
        } else if (!$client->num_rows() > 0) {
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
                redirect('user/' .  $user_id . '/dashboard/profile');
            }
        }

        $this->db->where('user_id', $user_id);
        $this->db->update('user');

        $this->session->set_flashdata('upload-success', 'Upload Gambar Berhasil');
        redirect('user/' .  $user_id . '/dashboard/profile');
    }

    public function updateProfile()
    {
        $user_id = $this->input->post('user_id');
        $user_name = $this->input->post('user_name');

        $dataUser = [
            'user_name' => $user_name,
        ];
        $client = $this->M_clients->checkClient(['client_user_id' => $user_id]);
        $this->M_public->updateData(['user_id' => $user_id], 'user', $dataUser);
        if ($client->num_rows() <= 0) {
            $client_id = getAutoNumber('clients', 'client_id', 'client-', 11);
        } else {
            $client_id = $client->row_array()['client_id'];
        }



        if ($client->num_rows() <= 0) {

            $dataClient = [
                'client_id' => $client_id,
                'client_fullname' => $this->input->post('fullname'),
                'client_address' => $this->input->post('alamat'),
                'client_user_id' => $user_id
            ];
            $this->M_public->insertData('clients', $dataClient);
            redirect('user/' .  $user_id . '/dashboard/profile');
        } else {

            $dataCustomer = [
                'client_fullname' => $this->input->post('fullname'),
                'client_address' => $this->input->post('alamat'),
                'client_phone' => $this->input->post('no_hp'),
            ];

            $this->M_public->updateData(['client_user_id' => $user_id], 'clients', $dataCustomer);
            redirect('user/' .  $user_id . '/dashboard/profile');
        }
    }

    public function transactions()
    {
        if ($this->session->userdata('primerental_user') != NULL) {
            $user = $this->M_user->getUser(['user_email' => $this->session->userdata('primerental_user')['user_email']]);
            if ($user->num_rows() > 0) {
                $user = $user->row_array();
                $rental = $this->M_trans->getTransactionsWithPayment(['rent_user_id' => $user['user_id']]);
                $carType = $this->M_public->getData('car_types')->result_array();

                if ($rental != false) {
                    $allTransaction = $rental->result_array();
                } else {
                    $allTransaction = FALSE;
                }
                // var_dump($allTransaction);
                $data['user'] = $user;
                $data['car_type'] = $carType;
                $data['transaksi'] = $allTransaction;
            } else {
                $data['user'] = [];
            }
        } else {
            $this->session->set_flashdata('auth-info', 'Silahkan login terlebih dahulu! untuk mengakses halamannya');
            redirect('autentifikasi/login');
        }


        $data['title'] = "Transaksi";

        $templatesPath  = $this->public['templates'];
        $views  = $this->public['pages'];

        $data['componentPath'] = $views . "components/";


        $this->load->view($templatesPath .  "header", $data);
        $this->load->view($templatesPath .  "sidebar", $data);
        $this->load->view($templatesPath .  "topbar", $data);
        $this->load->view($views .  "user-transactions", $data);
        $this->load->view($templatesPath .  "end", $data);
    }


    public function userDetailTransaction()
    {
        if ($this->session->userdata('primerental_user') != NULL) {
            $user = $this->M_user->getUser(['user_email' => $this->session->userdata('primerental_user')['user_email']]);
            if ($user->num_rows() > 0) {
                $user = $user->row_array();

                $rentId = $this->uri->segment(3);
                $result = $this->M_trans->getDetailUserTransaction(['rent_id' => $rentId]);
                $client  = $this->M_clients->checkClient(['client_user_id' => $result['rent_user_id']])->row_array();
                // $customer = $this->M_costumer->cekCostumer(['cos_user_id' => $result['rent_user_id']])->row_array();
                $carType = $this->M_public->getDataWhere('car_types', ['type_id' => $result['car_type_id']])->row_array();

                $date_rent_start = strtotime($result['rent_date_start']);
                $date_end = strtotime($result['rent_date_end']);
                $datediff = $date_end - $date_rent_start;

                $jmlHari = round($datediff / (60 * 60 * 24));
                $maxHari = 3;
                $tgl_max_kembali = date('d F Y ', $date_end + (24 * 3600 * $maxHari));

                if ($result['rent_service'] == 2 || $result['rent_service'] == 3) {
                    $driverPrice = "100000";
                } else {
                    $driverPrice = "0";
                }

                $totalDriver = $driverPrice * $jmlHari;

                $totalharga = $jmlHari * $result['car_price'];
                $result['car_price_format'] = "Rp. " . number_format($result['car_price'], 0, ',', '.');
                $result['car_photo'] = base_url('assets/uploads/cars/') . $result['car_photo'];
                $result['days'] = $jmlHari;
                $result['rent_price_format'] = "Rp. " . number_format($totalharga, 0, ',', '.');
                $result['rent_driver_price'] = "Rp. " . number_format($totalDriver, 0, ',', '.');
                $result['rent_date'] = date('F d, Y ', strtotime($result['rent_date']));
                $result['rent_date_start'] = date('F d, Y ', $date_rent_start);
                $result['rent_date_end'] = date('F d, Y ', $date_end);
                $result['rent_max_returned'] = $tgl_max_kembali;



                $data['user'] = $user;
                $data['transaksi'] = $result;
                $data['tipe_mobil'] = $carType;
                $data['klien'] = $client;
                $data['bank'] = $this->M_public->getDataWhere('bank', ['bank_id' => $result['payment_bank_id']])->row_array();
            } else {
                $data['user'] = [];
            }
        } else {
            $this->session->set_flashdata('auth-info', 'Silahkan login terlebih dahulu! untuk mengakses halamannya');
            redirect('autentifikasi/login');
        }

        $data['title'] = "Invoice";

        $templatesPath  = $this->public['templates'];
        $views  = $this->public['pages'];

        $data['componentPath'] = $views . "components/";
        $this->load->view($templatesPath .  "header", $data);
        $this->load->view($templatesPath .  "sidebar", $data);
        $this->load->view($templatesPath .  "topbar", $data);
        $this->load->view($views .  "invoice-transaction", $data);
        $this->load->view($templatesPath .  "end", $data);
    }

    public function invoicePayment()
    {
        if ($this->session->userdata('primerental_user') != NULL) {
            $user = $this->M_user->getUser(['user_email' => $this->session->userdata('primerental_user')['user_email']]);
            if ($user->num_rows() > 0) {
                $user = $user->row_array();


                $rent_id = $this->input->get('rentId');
                $payment = $this->M_trans->getTransactionsWithPayment(['payment_rental_id' => $rent_id])->row_array();

                $date_rent = strtotime($payment['rent_date']);
                // // $date_rent = strtotime('2020-07-02 04:00:00');
                // $date_rent = '2020-07-02 20:00:00';


                $expired =  date('Y-m-d G:i:s', $date_rent + (24 * 3600 * 1));


                if ($payment['payment_proof'] != "") {
                    $data['status_upload'] = false;
                } else {
                    $data['status_upload'] = true;
                }

                $date_rent_start = strtotime($payment['rent_date_start']);
                $date_end = strtotime($payment['rent_date_end']);
                $datediff = $date_end - $date_rent_start;

                $jmlHari = round($datediff / (60 * 60 * 24));


                $payment['rent_subtotal'] = $jmlHari * $payment['car_price'];
                $payment['payment_expired'] = $expired;

                $bank = $this->M_public->getDataWhere('bank', ['bank_id' => $payment['payment_bank_id']])->row_array();

                $data['user'] = $user;
                $data['bank'] = $bank;
                $data['allbank'] = $this->M_public->getData('bank')->result_array();
                $data['payment'] = $payment;
                $data['car_type'] =   $this->M_public->getDataWhere('car_types', ['type_id' => $payment['car_type_id']])->row_array();
            } else {
                $data['user'] = [];
            }
        } else {
            $this->session->set_flashdata('auth-info', 'Silahkan login terlebih dahulu! untuk mengakses halamannya');
            redirect('autentifikasi/login');
        }

        $data['title'] = "Invoice pembayaran";
        $templatesPath  = $this->public['templates'];
        $views  = $this->public['pages'];

        $data['componentPath'] = $views . "components/";

        $this->load->view($templatesPath .  "header", $data);
        $this->load->view($templatesPath .  "sidebar", $data);
        $this->load->view($templatesPath .  "topbar", $data);
        $this->load->view($views .  "invoice/invoice-payment", $data);
        $this->load->view($templatesPath .  "end", $data);
    }
}
