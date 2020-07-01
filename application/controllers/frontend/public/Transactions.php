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
            $client = $this->M_clients->checkClient(['client_user_id' => $user['user_id']]);
            $admin = $this->M_user->getAdmin(['admin_user_id' => $user['user_id']]);

            if ($admin->num_rows() > 0) {
                $this->session->set_flashdata('error-rental', 'Akun ini adalah akun administrator!, Silahkan ganti ke akun costumer');
                redirect($oldUrl);
            } else {
                $data['client'] = $client;
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

        if ($client->num_rows() < 1) {
            $this->form_validation->set_rules(
                'client_name',
                'Nama',
                'required|trim',
            );
            $this->form_validation->set_rules(
                'client_address',
                'Alamat Lengkap',
                'required|trim',
            );
            $this->form_validation->set_rules(
                'client_phone',
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
            'rent_serv',
            'Layanan',
            'required|trim',
        );

        $this->form_validation->set_rules(
            'destination[]',
            'Kota Tujuan',
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
            $statusInputDataClients = $this->input->post('input_client');
            $city = $this->input->post('city');
            $listDesination = $this->input->post('destination[]');
            $destination = implode(", ", $listDesination);
            $rental_service = $this->input->post('rent_serv', TRUE);
            if ($rental_service == "2" || $rental_service == "3") {
                $pickup_address = $this->input->post('pickup_address');
            } else {
                $pickup_address = "";
            }


            $date_start = date('Y-m-d', strtotime($this->input->post('date_start')));
            $date_end = date('Y-m-d', strtotime($this->input->post('date_end')));

            $date1 = strtotime($date_start);
            $date2 = strtotime($date_end);
            $datediff = $date2 - $date1;

            $total_days = round($datediff / (60 * 60 * 24));
            $maxDays = 3;
            $date_max_returned =  date('Y-m-d', $date2 + (24 * 3600 * $total_days));

            $total_price = $total_days * $car_price;


            if ($total_days <= 0) {
                $this->session->set_flashdata('error-date', 'Silahkan periksa kembali tanggal penyewaannya!');
                redirect($fullURL);
            } else {
                $rent_id = getAutoNumber('rental_trans', 'rent_id', 'rent-', 8);
                $client_id = getAutoNumber('clients', 'client_id', 'client-', 11);

                $data_insert_to_table_transaction = [

                    'rent_id' => $rent_id,
                    'rent_user_id ' => $rent_user_id,
                    'rent_client_id' => $client_id,
                    'rent_car_id ' => $rent_car_id,
                    'rent_fine' => "-",
                    "rent_type" => 1,
                    "rent_service" => $rental_service,
                    "rent_date" => date('Y-m-d h:i:s A', time()),
                    "rent_date_start" => $date_start,
                    "rent_date_end" => $date_end,
                    'rent_return_status' => "-",
                    'rent_status' => "belum selesai",
                    'rent_pay_status' => 0,
                    "rent_city" => $city,
                    "rent_city_destin" => $destination,
                    'rent_price' => $total_price,
                    'rent_pickup_address' => $pickup_address
                ];


                $updateCarStatus = [
                    'car_status' => 1
                ];

                if ($statusInputDataClients) {

                    // $upload_IDcard_image = $_FILES['IDcard_img']['name'];

                    // if ($upload_IDcard_image) {
                    //     $config['upload_path']          = './assets/uploads/client-IDcard/';
                    //     $config['allowed_types']        = 'gif|jpg|png|jpeg';
                    //     $config['file_name']            = 'fotoKTP-' . $client_id . "-" . date('dmY', time());
                    //     $config['overwrite']            = true;

                    //     $this->load->library('upload', $config);

                    //     if ($this->upload->do_upload('IDcard_img')) {


                    //         $clientIDcard_img = $this->upload->data('file_name');
                    //     } else {
                    //         $this->session->set_flashdata('error-date', 'Ada kesalahan saat upload foto KTP anda!');
                    //         redirect($fullURL);
                    //     }
                    // } else {
                    //     $this->session->set_flashdata('error-date', 'Silahkan upload foto KTP anda!');
                    //     redirect($fullURL);
                    // }


                    $data_insert_to_table_clients = [
                        'client_id' => $client_id,
                        'client_fullname' => $this->input->post('client_name'),
                        'client_user_id' => $rent_user_id,
                        'client_address' => $this->input->post('client_address'),
                        'client_phone' => $this->input->post('client_name'),
                        'client_status' => 0
                    ];
                    $this->M_public->insertData('clients', $data_insert_to_table_clients);
                }

                $this->M_public->insertData('rental_trans', $data_insert_to_table_transaction);
                $this->M_public->updateData(['car_id' => $rent_car_id], 'cars', $updateCarStatus);
                $invoice['rent_id'] = $rent_id;
                $invoice['client_id'] = $client_id;
                $_SESSION['invoice'] = $invoice;
                redirect('pembayaran?rentid=' . $rent_id . '&userid=' . $rent_user_id);
            }
        }
    }


    public function payments()
    {
        $user = $this->M_user->getUser(['user_email' => $this->session->userdata('primerental_user')['user_email']])->row_array();

        if (!$this->session->userdata('invoice')) {
            if (!$user) {
                $this->session->set_flashdata('auth-error', 'Akses ditolak, silahkan login dulu!');
                redirect('autentifikasi/login');
            } else {
                redirect("dashboard/u/" . $user['user_id'] . "/transaksi");
            }
        } else {
            $rent_id = $this->input->get('rentid');
            $user_id = $this->input->get('userid');

            $invoice_rental = $this->M_trans->getRentalWhere(['rent_id' => $rent_id]);

            $sessionInvoice = $this->session->userdata('invoice');

            if ($invoice_rental['rent_id'] == $sessionInvoice['rent_id'] && $invoice_rental['rent_client_id'] == $sessionInvoice['client_id'] && $invoice_rental['rent_user_id'] == $user_id) {


                $date_rent_start = strtotime($invoice_rental['rent_date_start']);
                $date_end = strtotime($invoice_rental['rent_date_end']);
                $datediff = $date_end - $date_rent_start;




                $jmlHari = round($datediff / (60 * 60 * 24));

                if ($invoice_rental['rent_service'] == 2 || $invoice_rental['rent_service'] == 3) {
                    $driverPrice = "100000";
                } else {
                    $driverPrice = "0";
                }

                $totalDriverPrice =  $driverPrice * $jmlHari;
                $totalsewa = $jmlHari * $invoice_rental['car_price'];

                $totalharga = $totalsewa + $totalDriverPrice;

                $invoice_rental['rent_price'] = $totalsewa;
                $invoice_rental['rent_driver_price'] = $totalDriverPrice;
                $invoice_rental['rent_total'] = $totalharga;
                // $invoice_rental['rent_price'] = "Rp. " . number_format($totalsewa, 0, ',', '.');
                // $invoice_rental['rent_driver_price'] = "Rp. " . number_format($totalDriverPrice, 0, ',', '.');
                // $invoice_rental['rent_total'] = "Rp. " . number_format($totalharga, 0, ',', '.');
                $invoice_rental['days'] = $jmlHari;



                $car = $this->M_cars->getCarWhere(['car_id' => $invoice_rental['rent_car_id']]);
                $car['car_format_price'] = number_format($car['car_price'], 0, ',', '.');
                $car['car_fine'] = $car['car_fine'] == "" ? "20.000" : number_format($car['car_fine'], 2, ',', '.');
                $data['car'] = $car;


                $data['invoice'] = $invoice_rental;
                $data['user'] = $user;
                $data['car'] = $car;
                $data['bank'] = $this->M_public->getData('bank')->result_array();

                $data['title'] =  "Pembayaran";
                $data['themeNavbar'] = "dark";
                $data['themeHamburger'] = "light";
                $data['linkColor'] = "primary";
                $templatesPath  = $this->public['templates'];
                $views  = $this->public['pages'];

                $data['componentPath'] = $views . "transactions/components/";
                $data['templatesPath'] = $templatesPath;

                // if ($this->form_validation->run() == false) {
                $this->load->view($templatesPath .  "header", $data);
                $this->load->view($templatesPath .  "navbar_mobile", $data);
                $this->load->view($templatesPath .  "sidebar", $data);
                $this->load->view($views .  "transactions/payments", $data);
                $this->load->view($templatesPath .  "footer", $data);
                $this->load->view($templatesPath .  "end", $data);
            }
        }
    }

    public function addPayment()
    {

        $rentId = $this->input->post('rent_id');
        $userId = $this->input->post('user_id');


        $priceTotal = $this->input->post('total_price');
        $rentPeriod = $this->input->post('rent_time');
        $method = $this->input->post('pay_menthod');
        $bank = $this->input->post('bank');
        $paymetId = getAutoNumber('payment_trans', 'payment_id', 'pay-', 7);

        $data = [
            'payment_id' => $paymetId,
            'payment_rental_id' => $rentId,
            'payment_user_id' => $userId,
            "payment_proof" => "",
            "payment_method" => $method,
            'payment_bank_id' => $bank,
            "payment_total" => $priceTotal,
            "payment_status" => 0,
            "payment_date" => time()
        ];


        $this->M_public->insertData('payment_trans', $data);

        // var_dump($sessionInvoice);

        // echo "<br><br>";

        // var_dump($data);

        $dataResponSession['rent_id'] = $rentId;
        $dataResponSession['user_id'] = $userId;
        $dataResponSession['total_price'] = $priceTotal;
        $dataResponSession['rent_period'] = $rentPeriod;
        $dataResponSession['payment_id'] = $paymetId;

        $_SESSION['respon_pesanan'] = $dataResponSession;
        redirect("session/respon-pesanan?rentId=" . $rentId . "&userId=" . $userId . "&paymentId=" . $paymetId . "&period=" . $dataResponSession['rent_period'] . "&pricetot=" . $dataResponSession['total_price']);
    }

    public function orderResponse()
    {

        $sessionReponse = $this->session->userdata('respon_pesanan');

        $user = $this->M_user->getUser(['user_email' => $this->session->userdata('primerental_user')['user_email']])->row_array();

        if (!$sessionReponse) {
            if (!$user) {
                $this->session->set_flashdata('auth-error', 'Akses ditolak, silahkan login dulu!');
                redirect('autentifikasi/login');
            } else {
                redirect('user/' . $user['user_id'] . '/dashboard/transaksi-saya');
            }
        } else {
            if ($this->session->userdata('invoice')) {
                unset($_SESSION['invoice']);
            }


            $rent_id = $this->input->get('rentId');
            $user_id = $this->input->get('userId');
            $rentPeriod = $this->input->get('period');
            $rentTotal = $this->input->get('pricetot');

            $dataRental = $this->M_trans->getTransactionsWithPayment(['rent_id' => $rent_id])->row_array();
            // var_dump($sessionReponse);
            // echo "<br><br>";
            // var_dump($dataRental);

            $dataRental['rent_periode'] = $rentPeriod;
            $dataRental['rent_total_price'] = $rentTotal;

            $data['rental'] = $dataRental;
            $data['bank'] = $this->M_public->getDataWhere("bank", ['bank_id' => $dataRental['payment_bank_id']])->row_array();
            $data['client'] = $this->M_clients->checkClient(['client_user_id' => $user_id])->row_array();
            $data['user'] = $user;


            $data['title'] =  "Pesanan Berhasil";
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
            $this->load->view($views .  "transactions/response-order", $data);
            $this->load->view($templatesPath .  "footer", $data);
            $this->load->view($templatesPath .  "end", $data);
        }
    }


    public function resetResponOrderSession()
    {

        $sessionReponse = $this->session->userdata('respon_pesanan');

        $user = $this->M_user->getUser(['user_email' => $this->session->userdata('primerental_user')['user_email']])->row_array();

        if (!$user) {
            $this->session->set_flashdata('auth-error', 'Akses ditolak, silahkan login dulu!');
            redirect('autentifikasi/login');
        } else {
            if ($sessionReponse) {
                unset($_SESSION['respon_pesanan']);
            }

            $rent_id = $this->input->get('rent_id');
            $rentTotal = $this->input->get('price');


            $dataUpdate = [
                "rent_price" => $rentTotal,
            ];


            $this->M_public->updateData(['rent_id' => $rent_id], 'rental_trans', $dataUpdate);


            redirect('user/' . $user['user_id'] . '/dashboard/transaksi-saya');
        }
    }



    public function uploadPaymentsProof()
    {



        $rent_id = $this->input->post('rent_id');

        $rental = $this->M_trans->getTransactionsWithPayment(['payment_rental_id' => $rent_id])->row_array();

        $upload_image = $_FILES['payment_proof']['name'];

        if ($upload_image) {
            $config['upload_path']          = './assets/uploads/payment-proof/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['file_name']            = "bukti-pembayaran-" . $rental['payment_id'] . "-" .  time();
            $config['overwrite']            = true;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('payment_proof')) {
                $gambar_baru = $this->upload->data('file_name');
                $this->db->set('payment_proof', $gambar_baru);
                $this->db->set('payment_date', time());
                $this->db->where('payment_rental_id', $rent_id);
                $this->db->update('payment_trans');

                $paymentSuccess['rent_id'] = $rent_id;
                $paymentSuccess['status'] = true;

                $_SESSION['payment_success'] = $paymentSuccess;
                redirect('session/payment-response?rent_id=' . $rental['rent_id'] . "&status=true");
            } else {
                redirect('session/payment-response?rent_id=' . $rental['rent_id'] . "&status=false");
            }
        } else {
            redirect('session/payment-response?rent_id=' . $rental['rent_id'] . "&status=false");
        }
    }

    public function paymentResponse()
    {

        $user = $this->M_user->getUser(['user_email' => $this->session->userdata('primerental_user')['user_email']])->row_array();
        $rent_id = $this->input->get('rent_id');
        $status = $this->input->get('status');
        $paymentSessionSuccess = $this->session->userdata('payment_success');
        $payment = $this->M_trans->getTransactionsWithPayment(['payment_rental_id' => $rent_id])->row_array();

        $data['user'] = $user;

        if (!$user) {
            $this->session->set_flashdata('auth-error', 'Akses ditolak, silahkan login dulu!');
            redirect('autentifikasi/login');
        } else {
            if ($paymentSessionSuccess) {
                if (!$paymentSessionSuccess['rent_id'] == $rent_id) {
                    redirect('user/' . $user['user_id'] . '/dashboard/transaksi-saya');
                } else {
                    $data['user'] = $user;
                    $data['payment'] =  $payment;
                    if ($status == "true" && $paymentSessionSuccess['status'] == "true") {
                        $data['title'] =  "Pembayaran berhasil";
                        $this->loadViewsPaymentResponse($data, 'success');
                    } else {
                        $data['title'] =  "Pembayaran Gagal";
                        $this->loadViewsPaymentResponse($data, 'failed');
                    }
                }
            } else {
                $data['user'] = $user;
                $data['payment'] =  $payment;
                $data['title'] =  "Pembayaran Gagal";
                if ($status == "true") {
                    redirect('session/payment-response?rent_id=' . $payment['rent_id'] . "&status=false");
                } else {
                    $this->loadViewsPaymentResponse($data, 'failed');
                }
            }
        }
    }

    public function loadViewsPaymentResponse($page_data, $main_view)
    {

        $data['user'] = $page_data['user'];
        $data['payment'] = $page_data['payment'];

        $data['title'] = $page_data['title'];

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

        $this->load->view($views .  "transactions/payments/" . $main_view, $data);
        $this->load->view($templatesPath .  "footer", $data);
        $this->load->view($templatesPath .  "end", $data);
    }

    public function resetPaymentSuccess()
    {

        $user = $this->M_user->getUser(['user_email' => $this->session->userdata('primerental_user')['user_email']])->row_array();
        $rent_id = $this->input->get('rent_id');

        $paymentSessionSuccess = $this->session->userdata('payment_success');


        if ($paymentSessionSuccess) {
            if ($paymentSessionSuccess['rent_id'] != $rent_id) {
                redirect('user/' . $user['user_id'] . '/dashboard/transaksi-saya');
            } else {
                unset($_SESSION['payment_success']);
                redirect('user/' . $user['user_id'] . '/dashboard/transaksi-saya');
            }
        } else {
            redirect('user/' . $user['user_id'] . '/dashboard/transaksi-saya');
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
