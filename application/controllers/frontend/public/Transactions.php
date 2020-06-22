<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transactions extends CI_Controller
{

    public $public = [
        "templates" => "frontEnd/templates/public/",
        "pages" => "frontEnd/pages/public/"

    ];

    public function index()
    {
        $oldUrl = $this->input->get("prev_url");
        $car_id = $this->input->get("car_id");
        if (!$this->session->userdata('primerental_user') != NULL) {
            $this->session->set_flashdata('error-rental', 'Tidak dapat melakukan transaksi, Silahkan login terlebih dahulu!');
            redirect($oldUrl);
        } else {
            $user = $this->M_user->getUser(['user_email' => $this->session->userdata('primerental_user')['user_email']])->row_array();
            $costumer = $this->M_costumer->cekCostumer(['cos_user_id' => $user['user_id']]);
            $admin = $this->M_user->getAdmin(['admin_user_id' => $user['user_id']]);

            if ($admin->num_rows() > 0) {
                $this->session->set_flashdata('error-rental', 'Akun ini adalah akun administrator!, Silahkan ganti ke akun costumer');
                redirect($oldUrl);
            } else {
                $data['costumer'] = $costumer;
                $data['user'] = $user;
            }
        }

        $car = $this->M_cars->getCarWhere(['car_id' => $car_id]);

        if ($car['car_status'] == "1") {
            redirect($oldUrl);
        }

        $data['title'] =  "Transaksi";
        $data['themeNavbar'] = "dark";
        $data['themeHamburger'] = "light";
        $data['linkColor'] = "primary";
        $templatesPath  = $this->public['templates'];
        $views  = $this->public['pages'];

        $data['componentPath'] = $views . "transactions/components/";
        $data['templatesPath'] = $templatesPath;

        $car = $this->M_cars->getCarWhere(['car_id' => $car_id]);
        $car['car_format_price'] = number_format($car['car_price'], 2, ',', '.');
        $car['car_fine'] = $car['car_fine'] == "" ? "20.000" : number_format($car['car_fine'], 2, ',', '.');
        $data['car'] = $car;

        if ($costumer->num_rows() < 1) {
            $this->form_validation->set_rules(
                'cos_name',
                'Nama',
                'required|trim',
            );
            $this->form_validation->set_rules(
                'cos_no_ID',
                'Nomor Identitas',
                'required|trim',
            );
            $this->form_validation->set_rules(
                'cos_address',
                'Alamat Lengkap',
                'required|trim',
            );
            $this->form_validation->set_rules(
                'cos_phone',
                'No telepon',
                'required|trim',
            );
        }

        $this->form_validation->set_rules(
            'city',
            'Kota',
            'required|trim',
        );
        $this->form_validation->set_rules(
            'date_start',
            'tgl mulai sewa',
            'required|trim',
        );
        $this->form_validation->set_rules(
            'date_end',
            'tgl berakhir',
            'required|trim',
        );
        $this->form_validation->set_rules(
            'with_driver',
            'Tipe penyewaan',
            'required|trim',
        );
        $this->form_validation->set_rules(
            'bank',
            'pilih bank',
            'required|trim',
        );

        $currentURL = current_url();
        $params = $_SERVER['QUERY_STRING'];
        $fullURL = $currentURL . '?' . $params;


        if ($this->form_validation->run() == false) {
            $this->load->view($templatesPath .  "header", $data);
            $this->load->view($templatesPath .  "navbar_mobile", $data);
            $this->load->view($templatesPath .  "sidebar", $data);
            $this->load->view($views .  "transactions/rental", $data);
            $this->load->view($templatesPath .  "footer", $data);
            $this->load->view($templatesPath .  "end", $data);
        } else {


            $rent_car_id = $this->input->post('car_id');
            $car_price = $this->input->post('car_price');
            $rent_user_id = $this->input->post('user_id');
            $city = $this->input->post('city');
            $method_pay = $this->input->post('method_pay');
            $bank_name = $this->input->post('bank');
            $rent_type = $this->input->post('with_driver');

            $date_start = date('Y-m-d', strtotime($this->input->post('date_start')));
            $date_end = date('Y-m-d', strtotime($this->input->post('date_end')));

            $date1 = strtotime($date_start);
            $date2 = strtotime($date_end);
            $datediff = $date2 - $date1;

            $total_days = round($datediff / (60 * 60 * 24));
            $maxDays = 3;
            $date_max_returned =  date('Y-m-d', $date2 + (24 * 3600 * $total_days));

            $total_price = $total_days * $car_price;
            if ($type_rent = "1") {
                $pickup_address = $this->input->post('pickup_address');
            } else {
                $pickup_address = "";
            }



            if ($total_days <= 0) {
                $this->session->set_flashdata('error-date', 'Silahkan periksa kembali tanggal penyewaannya!');
                redirect($fullURL);
            } else {
                $rent_id = getAutoNumber('rental_trans', 'rent_id', 'rent-', 8);

                $data_insert_to_table_transaction = [
                    'rent_id' => $rent_id,
                    'rent_user_id ' => $rent_user_id,
                    'rent_car_id ' => $rent_car_id,
                    'rent_fine' => "-",
                    "rent_type" => $rent_type,
                    "rent_date" => date('Y-m-d', time()),
                    "rent_date_start" => $date_start,
                    "rent_date_end" => $date_end,
                    'rent_date_returned' => "0000-00-00",
                    'rent_return_status' => "-",
                    'rent_status' => "belum selesai",
                    'rent_method_pay' => $method_pay,
                    'rent_bank' => $bank_name,
                    'rent_pay_status' => 0,
                    'rent_proof_pay' => "",
                    "rent_city" => $city,
                    'rent_price' => $total_price,
                    'rent_pickup_address' => $pickup_address
                ];

                $updateCarStatus = [
                    'car_status' => 1
                ];

                $this->M_public->insertData('rental_trans', $data_insert_to_table_transaction);
                $this->M_public->updateData(['car_id' => $rent_car_id], 'cars', $updateCarStatus);

                if ($costumer->num_rows() < 1) {
                    $data_insert_to_table_costumers = [
                        'cos_name' => $this->input->post('cos_name'),
                        'cos_address' => $this->input->post('cos_address'),
                        'cos_phone' => $this->input->post('cos_phone'),
                        'cos_ID_num' => $this->input->post('cos_no_ID'),
                        'cos_user_id' => $rent_user_id,
                    ];
                    $this->M_public->insertData('costumer', $data_insert_to_table_costumers);
                }
                $receipt['rent_id'] = $rent_id;
                $receipt['user_id'] = $user['user_id'];
                $_SESSION['receipt'] = $receipt;
                redirect('status-transaksi?rent_id=' . $rent_id);
            }
        }
    }

    public function receipt_transactions()
    {

        $user = $this->M_user->getUser(['user_email' => $this->session->userdata('primerental_user')['user_email']])->row_array();

        if (!$this->session->userdata('receipt')) {
            if (!$user) {
                $this->session->set_flashdata('auth-error', 'Akses ditolak, silahkan login dulu!');
                redirect('autentifikasi/login');
            } else {
                redirect('user/' . $user['user_id'] . '/dashboard/transaksi-saya');
            }
        } else {

            $rent_id = $this->input->get('rent_id');
            $result  = $this->M_trans->getRentalWhere(['rent_id' => $rent_id]);
            $sessionReceipt = $this->session->userdata('receipt');

            if ($result['rent_id'] == $sessionReceipt['rent_id'] && $result['rent_user_id'] == $sessionReceipt['user_id'] && $user['user_id']) {
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


                // main data 
                $data['user'] = $user;
                $data['receipt'] = $result;
                $data['costumer'] = $this->M_costumer->cekCostumer(['user_id' => $result['rent_user_id']])->row_array();
                $data['title'] =  "Transaksi Berhasil";
                $data['themeNavbar'] = "light";
                $data['themeHamburger'] = "dark";
                $data['linkColor'] = "secondary";
                $templatesPath  = $this->public['templates'];
                $views  = $this->public['pages'];

                $data['componentPath'] = $views . "transactions/components/";
                $data['templatesPath'] = $templatesPath;


                $this->load->view($templatesPath .  "header", $data);
                $this->load->view($templatesPath .  "navbar_mobile", $data);
                $this->load->view($templatesPath .  "sidebar", $data);
                $this->load->view($views .  "transactions/rental-success", $data);
                $this->load->view($templatesPath .  "footer", $data);
                $this->load->view($templatesPath .  "end", $data);
            }
        }
    }
}
