<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Rental extends CI_Controller
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
        $user = $this->M_user->getUser(['user_email' => $this->session->userdata('primerental')['user_email']])->row_array();
        $cars = $this->M_cars->getAllCars()->result_array();

        $data = [
            'title' => 'Demo ',
            'user' => $user,
            'cars' => $cars
        ];


        $backendTemplates = $this->publicData['backendTemplates'];
        $viewsDashboardPath = 'backend/dashboard/';
        $this->load->view($backendTemplates . 'header', $data);
        $this->load->view($backendTemplates . 'topbar', $data);
        $this->load->view($backendTemplates . 'sidebar', $data);
        $this->load->view($viewsDashboardPath . 'demo/v_demo', $data); //main content
        $this->load->view($backendTemplates . 'footer', $data);
        $this->load->view($viewsDashboardPath . '/plugins/_demo', $data); //plugins
        $this->load->view($backendTemplates . 'script', $data);
        // costum js
        $this->load->view($viewsDashboardPath . 'demo/js/js_demo', $data);
        $this->load->view($backendTemplates . 'end', $data);
    }

    public function transaction_rent()
    {

        $user = $this->M_user->getUser(['user_email' => $this->session->userdata('primerental')['user_email']])->row_array();


        $car_id = $this->uri->segment(4);

        $car = $this->M_cars->getCarWhere(['car_id' => $car_id]);
        $car['car_format_price'] = "Rp. " . number_format($car['car_price'], 2, ',', '.');
        $car['car_format_fine'] = "Rp. " . number_format($car['car_fine'], 2, ',', '.');

        $city = [
            'Jakarta',
            'Bogor',
            'Depok',
            'Tanggerang',
            'Bekasi'
        ];

        $data = [
            'title' => 'Demo Transaksi',
            'user' => $user,
            'car' => $car,
            'city' => $city
        ];


        $cekUser = $this->M_costumer->cekCostumer(['user_id' => $user['user_id']]);

        if ($cekUser->num_rows() < 1) {
            $pesan = [
                'Silahkan lengkapi data diri anda terlebih dahulu'
            ];
            $this->session->set_flashdata('pesan', $pesan);
            redirect('administrator/rental');
        } else {
            $backendTemplates = $this->publicData['backendTemplates'];
            $viewsDashboardPath = 'backend/dashboard/';
            $this->load->view($backendTemplates . 'header', $data);
            $this->load->view($backendTemplates . 'topbar', $data);
            $this->load->view($backendTemplates . 'sidebar', $data);
            $this->load->view($viewsDashboardPath . 'demo/v_Trental', $data); //main content
            $this->load->view($backendTemplates . 'footer', $data);
            $this->load->view($viewsDashboardPath . '/plugins/_demo', $data); //plugins
            $this->load->view($backendTemplates . 'script', $data);
            // costum js
            $this->load->view($viewsDashboardPath . 'demo/js/js_demo', $data);
            $this->load->view($backendTemplates . 'end', $data);
        }

        // var_dump($cekUser->num_rows());
    }

    public function add_rental()
    {

        $mobil_id = $this->input->post('car_id');
        $harga_mobil = $this->input->post('car_price');
        $user_id = $this->input->post('user_id');
        $denda = $this->input->post('denda');
        $kota = $this->input->post('kota');
        $alamat = $this->input->post('alamat');
        $pakai_supir = $this->input->post('supir');
        $tgl_mulai = date('Y-m-d', strtotime($this->input->post('tgl_mulai_sewa')));
        $tgl_akhir = date('Y-m-d', strtotime($this->input->post('tgl_akhir_sewa')));

        $date1 = strtotime($tgl_mulai);
        $date2 = strtotime($tgl_akhir);
        $datediff = $date2 - $date1;

        $jmlHari = round($datediff / (60 * 60 * 24));
        $maxHari = 3;
        $tgl_max_kembali = date('Y-m-d', $date2 + (24 * 3600 * $maxHari));

        $totalharga = $jmlHari * $harga_mobil;

        if ($jmlHari < 0) {
            $this->session->set_flashdata('pesan-tgl', 'Silahkan periksa kembali tanggal penyewaannya!');
            redirect('administrator/rental/transaction/' . $mobil_id);
        } else {
            $rent_id = getAutoNumber('rental_trans', 'rent_id', 'rent-', 8);
            $data = [
                'rent_id' => $rent_id,
                'rent_car_id' => $mobil_id,
                'rent_user_id' => $user_id,
                'rent_fine' => $denda,
                'rent_type' => $pakai_supir,
                'rent_date' => date('Y-m-d', time()),
                'rent_date_start' => $tgl_mulai,
                'rent_date_end' => $tgl_akhir,
                'rent_date_returned' => "0000-00-00",
                'rent_return_status' => "-",
                'rent_status' => "belum selesai",
                'rent_pay_status' => 0,
                'rent_proof_pay' => "",
                'rent_city' => $kota,
                // 'rent_date_max_returned' => $tgl_max_kembali,
                // 'rent_days' => $jmlHari,
                'rent_price' => $totalharga,
                'rent_address' => $alamat
            ];

            $updateStatus = [
                'car_status' => 1
            ];





            $this->M_public->insertData('rental_trans', $data);
            $this->M_public->updateData(['car_id' => $mobil_id], 'cars', $updateStatus);

            $receipt['rent_id'] = $rent_id;
            $_SESSION['receipt'] = $receipt;

            // $this->session->set_userdata('data-receipt', $recipt_data);
            redirect('admistrator/rental/receipt');
        }
    }

    public function receipt()
    {

        // if($this->session->)
        // var_dump($this->session->userdata('data-receipt'));

        $user = $this->M_user->getUser(['user_email' => $this->session->userdata('primerental')['user_email']])->row_array();




        if ($this->session->userdata('receipt')) {
            $rent_id = $_SESSION['receipt']['rent_id'];

            $result  = $this->M_trans->getRentalWhere(['rent_id' => $rent_id]);



            $date_rent_start = strtotime($result['rent_date_start']);
            $date_end = strtotime($result['rent_date_end']);

            $datediff = $date_end - $date_rent_start;

            $jmlHari = round($datediff / (60 * 60 * 24));
            $maxHari = 3;
            $tgl_max_kembali = date('F d, Y ', $date_end + (24 * 3600 * $maxHari));

            $totalharga = $jmlHari * $result['car_price'];
            $result['car_price'] = "Rp. " . number_format($result['car_price'], 0, ',', '.');
            $result['car_photo'] = base_url('assets/uploads/cars/') . $result['car_photo'];
            $result['days'] = $jmlHari;
            $result['rent_price'] = "Rp. " . number_format($totalharga, 0, ',', '.');
            $result['rent_date'] = date('F d, Y ', strtotime($result['rent_date']));
            $result['rent_date_start'] = date('F d, Y ', $date_rent_start);
            $result['rent_date_end'] = date('F d, Y ', $date_end);
            $result['rent_max_returned'] = $tgl_max_kembali;
            $result['rent_type'] = $result['rent_type'] == 1 ? 'Pakai Supir' : 'Tidak Pakai Supir';




            $data = [
                'user' => $user,
                'receipt' => $result,
                'title' => 'Receipt',
                'costumer' => $this->M_costumer->cekCostumer(['user_id' => $result['rent_user_id']])->row_array()
            ];

            $backendTemplates = $this->publicData['backendTemplates'];
            $viewsDashboardPath = 'backend/dashboard/';
            $this->load->view($backendTemplates . 'header', $data);
            $this->load->view($backendTemplates . 'topbar', $data);
            $this->load->view($backendTemplates . 'sidebar', $data);
            $this->load->view($viewsDashboardPath . 'demo/v_receipt', $data); //main content
            $this->load->view($backendTemplates . 'footer', $data);
            $this->load->view($viewsDashboardPath . '/plugins/_demo', $data); //plugins
            $this->load->view($backendTemplates . 'script', $data);
            // costum js
            $this->load->view($viewsDashboardPath . 'demo/js/js_demo', $data);
            $this->load->view($backendTemplates . 'end', $data);
        } else {
            echo "Opps..";
        }
    }


    public function reset_receipt()
    {
        $user = $this->M_user->getUser(['user_email' => $this->session->userdata('primerental')['user_email']])->row_array();
        unset($_SESSION['receipt']);
        redirect('admistrator/rental/transaction/u/' . $user['user_id']);
    }


    public function userTransaction()
    {

        $user = $this->M_user->getUser(['user_email' => $this->session->userdata('primerental')['user_email']])->row_array();

        $rent = $this->M_trans->getUserRental(['rent_user_id' => $user['user_id']]);






        if ($rent == false) {
            $data['rent'] = [];
        } else {
            $rowRent = $rent->result();

            foreach ($rowRent as $r) {
                $r->car_photo = base_url('assets/uploads/cars/') . $r->car_photo;
                $date_rent_start = strtotime($r->rent_date_start);
                $date_end = strtotime($r->rent_date_end);

                $datediff = $date_end - $date_rent_start;
                $rent['days'] = round($datediff / (60 * 60 * 24));
                $row[] = $r;

                $data[] = $row;
            }
            $data['rent'] = $rent->result();


            // $date_rent_start = strtotime($rent['rent_date_start']);
            // $date_end = strtotime($rent['rent_date_end']);

            // $datediff = $date_end - $date_rent_start;

            // $rent['days'] = round($datediff / (60 * 60 * 24));

        }

        var_dump($data['rent']);
        die();
        $data['title'] = 'User Transaksi';
        $data['user'] = $user;


        $cekUser = $this->M_costumer->cekCostumer(['user_id' => $user['user_id']]);

        $data['cos'] = $cekUser->row_array();

        if ($cekUser->num_rows() < 1) {
            $pesan = [
                'Silahkan lengkapi data diri anda terlebih dahulu'
            ];
            $this->session->set_flashdata('pesan', $pesan);
            redirect('administrator/rental');
        } else {
            $backendTemplates = $this->publicData['backendTemplates'];
            $viewsDashboardPath = 'backend/dashboard/';
            $this->load->view($backendTemplates . 'header', $data);
            $this->load->view($backendTemplates . 'topbar', $data);
            $this->load->view($backendTemplates . 'sidebar', $data);
            $this->load->view($viewsDashboardPath . 'demo/v_u-trans', $data); //main content
            $this->load->view($backendTemplates . 'footer', $data);
            $this->load->view($viewsDashboardPath . '/plugins/_demo', $data); //plugins
            $this->load->view($backendTemplates . 'script', $data);
            // costum js
            $this->load->view($viewsDashboardPath . 'demo/js/js_demo', $data);
            $this->load->view($backendTemplates . 'end', $data);
        }
    }
}
