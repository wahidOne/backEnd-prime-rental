<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction extends CI_Controller
{
    public $publicData = [
        'backendTemplates' => 'backend/templates/public/'
    ];

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function rental()
    {
        $user = $this->M_user->getUser(['user_email' => $this->session->userdata('primerental')['user_email']])->row_array();
        $data = [
            'title' => 'Rental transaction',
            'user' => $user,
        ];

        $backendTemplates = $this->publicData['backendTemplates'];
        $viewsDashboardPath = 'backend/dashboard/';
        $this->load->view($backendTemplates . 'header', $data);
        $this->load->view($backendTemplates . 'topbar', $data);
        $this->load->view($backendTemplates . 'sidebar', $data);
        $this->load->view($viewsDashboardPath . 'trans/v_rent', $data); //main content
        $this->load->view($backendTemplates . 'footer', $data);
        $this->load->view($viewsDashboardPath . '/plugins/_transaction', $data); //plugins
        $this->load->view($backendTemplates . 'script', $data);
        // costum js
        $this->load->view($viewsDashboardPath . 'trans/js/js_rent', $data);
        $this->load->view($backendTemplates . 'end', $data);
    }

    public function loadRentalData()
    {
        $rent = $this->M_trans->get_datatables_rental();
        $data = array();
        $no = @$_POST['start'];


        foreach ($rent as $r) {



            $no++;
            $row = array();
            $row[] = $no;
            $row[] = date('l, d/m/Y', strtotime($r->rent_date));
            $row[] = $r->rent_id;
            $row[] = '<span class="text-capitalize">' . $r->client_fullname  . '</span>';
            $row[] = $r->car_brand;
            $row[] = "Rp." . number_format($r->rent_price, 0, ',', '.');

            if ($r->rent_service == 1) {
                $service = "Self Driver";
            } elseif ($r->rent_service == 2) {
                $service = "With Driver";
            } elseif ($r->rent_service == 3) {
                $service = "All In";
            }

            $row[] = $service;




            if ($r->rent_status == "belum selesai" && $r->rent_order_status == 0 && $r->payment_proof == "" && $r->payment_status == 0) {
                $konfirmasi = '<a href="#" class="btn btn-success disabled btn-sm   "  tabindex="-1" role="button" aria-disabled="true" >
                <i class="fas fa-check-square my-auto "></i>
                </a>';
                // status
                $status = "<span class='badge badge-danger text-white text-capitalize w-100  '>Menunggu Pembayaran</span>";
            } elseif ($r->rent_status == "belum selesai" && $r->rent_order_status == 0 && $r->payment_proof !== "" && $r->payment_status == 0) {
                $konfirmasi = '<a href="#" class="btn btn-success disabled btn-sm"  tabindex="-1" role="button" aria-disabled="true" >
                <i class="fas fa-check-square  my-auto"></i>
                </a>';
                // status
                $status = "<span class='badge badge-warning text-dark text-capitalize w-100  '>Konfirmasi Pembayaran</span>";
            } elseif ($r->rent_status == "belum selesai" && $r->rent_order_status == 0 && $r->payment_proof !== "" && $r->payment_status == 1) {
                $konfirmasi = '<a href="#" class="btn btn-success disabled btn-sm"  tabindex="-1" role="button" aria-disabled="true" >
                <i class="fas fa-check-square  my-auto "></i>
                </a>';
                // status
                $status = "<span class='badge badge-primary text-dark text-capitalize w-100'>Pembayaran Selesai</span>";
            } elseif ($r->rent_status == "belum selesai" && $r->rent_order_status == 1 && $r->payment_proof !== "" && $r->payment_status == 1) {
                $konfirmasi = '
                <a href="#" class="btn btn-success btn-sm">
                    <i class="fas fa-check-square"></i>
                </a>';
                $status = "<span class='badge badge-outlineinfo  text-info text-capitalize w-100  '>Menunggu Persetujuan</span>";
            } elseif ($r->rent_status == "jalan" && $r->rent_order_status == 1 && $r->payment_proof !== "" && $r->payment_status == 1) {
                $konfirmasi = '<a href="#" class="btn btn-success disabled btn-xs "  tabindex="-1" role="button" aria-disabled="true">
                Telah dikonfirmasi
                </a>';
                $status = "<span class='badge badge-info text-dark text-capitalize w-100'>Sedan Jalan</span>";
            } else {
                $status = false;
                $konfirmasi = false;
            }




            // if ($r->payment_proof == "" && $r->payment_status == "0") {
            //     $statusPay = "<span class=' badge badge-warning text-capitalize ' > Menunggu Pembayaran </span>";
            // } elseif (!$r->payment_proof == "" && !$r->payment_status == 1) {
            //     $statusPay = "<span class='badge badge-info text-capitalize ' > Menunggu Konfirmasi</span>";
            // } elseif ($r->payment_proof != "" && $r->payment_status == 1) {
            //     $statusPay = "<span class=' badge badge-outlinesuccess text-capitalize  '>Pembayaran selesai</span>";
            // } elseif ($r->payment_status == "Expired") {
            //     $statusPay = "<span class='badge badge-danger  text-capitalize  '>Pembayaran Terlambat</span>";
            // }

            $row[] = $status;
            $row[] = $konfirmasi;
            $row[] = ' 
                    <div class="dropleft">
                        <button class="btn p-0" type="button" id="' . $r->rent_id . '" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                            <i class="fas fa-ellipsis-v text-primary-muted "></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="' . $r->rent_id . '">
                            <a id="check-payment" class="dropdown-item d-flex align-items-center text-primary " href="' .  base_url('administrator/transaction/check-payment?rent_id=') .  $r->rent_id . '&user_id=' . $r->user_id . '">
                                <i class=" fad fa-hand-holding-usd mr-2 fa-fw "></i> 
                                <span class="">Cek Pembayaran</span>
                            </a>
                            <a id="btn-info" class="dropdown-item d-flex align-items-center text-info " href="' . site_url('administrator/transaction/get-rent/') . $r->rent_id . '">
                                <i class=" fad fa-file-invoice  mr-2 fa-fw "></i> 
                                <span class="">Invoice</span>
                            </a>
                            
                            <a class="dropdown-item d-flex align-items-center text-danger " href="#">
                                <i class=" far fa-times   mr-2 fa-fw "></i> 
                                <span class="">Batalkan</span>
                            </a>
                            
                        </div>
                    </div>
            ';
            // $row[] = '<div class="d-flex justify-content-center">
            //             <a id="btn-info" href="' . site_url('administrator/transaction/get-rent/') . $r->rent_id . '" class="badge badge-info text-dark">
            //                 <i class="fad fa-fw fa-info"></i>Detail
            //             </a>
            //             <a data-id="' . $r->rent_id  . '" id="hapus-menu" href="' . site_url('administrator/transaction/delete-rent/')  . '" class="badge badge-success text-dark ml-2">
            //                 <i class="far fa-fw fa-check"></i> Confirm
            //             </a>
            //             <a data-id="' . $r->rent_id  . '" id="hapus-menu" href="' . site_url('administrator/transaction/delete-rent/')  . '" class="badge badge-danger text-dark ml-2">
            //                 <i class="far fa-fw fa-times "></i> Reject
            //             </a>
            //         </div>
            // ';
            // add html for action

            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->M_trans->count_all('rental_trans'),
            "recordsFiltered" => $this->M_trans->count_filtered_rental(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }



    public function getRental()
    {
        $id_rent = $this->uri->segment(4);
        $result  = $this->M_trans->getRentalWhere(['rent_id' => $id_rent]);

        $date_rent_start = strtotime($result['rent_date_start']);
        $date_end = strtotime($result['rent_date_end']);

        $days = abs(($date_end - $date_rent_start) / (60 * 60 * 24));

        $max_days = 3;
        $max_return = date('d F Y', $date_end + (24 * 3600 * $max_days));
        $result['rent_days'] = $days;
        $result['rent_date_max_return'] = $max_return;
        $result['rent_date'] = date("d F Y", strtotime($result['rent_date']));
        $result['rent_date_start'] = date("d F Y", strtotime($result['rent_date_start']));
        $result['rent_date_end'] = date("d F Y", strtotime($result['rent_date_end']));
        $result['rent_type'] = $result['rent_type'] == 1 ? 'Pakai Supir' : 'Tidak Pakai Supir';
        $totalPrice = $result['car_price'] * $days;
        $result['rent_price'] = "Rp. " . number_format($totalPrice, 0, ',', '.');
        // if (empty($result['rent_proof_pay'])) {
        //     $result['rent_pay_status'] = "<small class='text-warning' >Belum upload bukti pembayaran</small>";
        // } elseif ($result['rent_pay_status'] == 0) {
        //     $result['rent_pay_status'] = "Menunggu konfirmasi";
        // } elseif ($result['rent_pay_status'] == 1) {
        //     $result['rent_pay_status'] = "Selesai";
        // }

        // if ($result['rent_date_returned'] == "0000-00-00") {
        //     $result['rent_date_returned'] = "-";
        // } else {
        //     $result['rent_date_returned'] = date("d F Y", strtotime($result['rent_date_returned']));
        // }

        $result['car_price'] = "Rp. " . number_format($result['car_price'], 0, ',', '.');


        $data['response'] = $result;
        echo json_encode($data);
    }

    public function checkPayment()
    {
        $rent_id = $this->input->get('rent_id');



        $user = $this->M_user->getUser(['user_email' => $this->session->userdata('primerental')['user_email']])->row_array();
        $payment = $this->M_trans->getTransactionsWithPayment(['rent_id' => $rent_id])->row_array();


        $date_rent = strtotime($payment['rent_date']);
        $expired =  date('Y-m-d G:i:s', $date_rent + (24 * 3600 * 1));
        $payment['payment_expired'] = $expired;


        $data = [
            'title' => 'Check Payment',
            'user' => $user,
            'payment' => $payment,

        ];

        $backendTemplates = $this->publicData['backendTemplates'];
        $viewsDashboardPath = 'backend/dashboard/';

        $data['viewsDashboardPath'] = $viewsDashboardPath;

        $this->load->view($backendTemplates . 'header', $data);
        $this->load->view($backendTemplates . 'topbar', $data);
        $this->load->view($backendTemplates . 'sidebar', $data);
        $this->load->view($viewsDashboardPath . 'trans/payment/v_check-payment', $data); //main content
        $this->load->view($backendTemplates . 'footer', $data);
        $this->load->view($viewsDashboardPath . '/plugins/_transaction', $data); //plugins
        $this->load->view($backendTemplates . 'script', $data);
        // costum js
        $this->load->view($viewsDashboardPath . 'trans/js/js_rent', $data);
        $this->load->view($backendTemplates . 'end', $data);
    }


    public function downloadPaymentProof()
    {
        $rent_id = $this->uri->segment(4);

        $this->load->helper('download');
        $fileinfo = $this->M_public->getDataWhere('payment_trans', ['payment_rental_id' => $rent_id])->row_array();
        $file = 'assets/uploads/payment-proof/' . $fileinfo['payment_proof'];
        force_download($file, NULL);
    }

    public function confirmPayment()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');

        $requestData = json_decode(file_get_contents('php://input'), true);
        foreach ($requestData as $key => $val) {
            // $val = filter_var($val, FILTER_SANITIZE_STRING); // Remove all HTML tags from string
            $requestData[$key] = $val;
            $requestData['inbox_id'] = getAutoNumber('inbox', 'inbox_id', 'inbox00', 10);
            $requestData['inbox_created_at'] = time();
            $requestData['inbox_status'] = 0;
        }
        $update = [
            'payment_status' => 1,
            'payment_date_confirm' => date("Y-m-d G:i:s")
        ];

        $this->M_public->updateData(['payment_rental_id' => $requestData['rent_id']], 'payment_trans', $update);

        $inbox = [
            'inbox_id' => $requestData['inbox_id'],
            'inbox_to' => $requestData['inbox_to'],
            'inbox_from' => $requestData['inbox_from'],
            'inbox_subject' => $requestData['inbox_subject'],
            'inbox_title' => $requestData['inbox_title'],
            'inbox_text' => $requestData['inbox_text'],
            'inbox_status' => $requestData['inbox_status'],
            'inbox_created_at' => $requestData['inbox_created_at'],
        ];

        $result = $this->M_public->insertData('inbox', $inbox);





        if ($result >= 0) {
            $response['data'] = $inbox;
            $response['status'] = TRUE;
            $response['redirect'] = base_url('administrator/transaction/rent');
            $data['response'] = $response;
        } else {
            $data = [];
        }

        // $data['inbox_subject'] = $inboxText;

        echo json_encode($data);
    }
    public function confirmPaymentDecline()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');

        $requestData = json_decode(file_get_contents('php://input'), true);
        foreach ($requestData as $key => $val) {
            // $val = filter_var($val, FILTER_SANITIZE_STRING); // Remove all HTML tags from string
            $requestData[$key] = $val;
            $requestData['inbox_id'] = getAutoNumber('inbox', 'inbox_id', 'inbox00', 10);
            $requestData['inbox_created_at'] = time();
            $requestData['inbox_status'] = 0;
        }

        $payment = $this->M_public->getDataWhere('payment_trans', ['payment_rental_id' => $requestData['rent_id']])->row_array();
        unlink(FCPATH . './assets/uploads/payment-proof/' . $payment['payment_proof']);

        $update = [
            'payment_proof' => "",
        ];

        $this->M_public->updateData(['payment_rental_id' => $requestData['rent_id']], 'payment_trans', $update);

        $inbox = [
            'inbox_id' => $requestData['inbox_id'],
            'inbox_to' => $requestData['inbox_to'],
            'inbox_from' => $requestData['inbox_from'],
            'inbox_subject' => $requestData['inbox_subject'],
            'inbox_title' => $requestData['inbox_title'],
            'inbox_text' => $requestData['inbox_text'],
            'inbox_status' => $requestData['inbox_status'],
            'inbox_created_at' => $requestData['inbox_created_at'],
        ];

        $result = $this->M_public->insertData('inbox', $inbox);
        if ($result >= 0) {
            $response['data'] = $inbox;
            $response['status'] = TRUE;
            $response['redirect'] = base_url('administrator/transaction/rent');
            $response['payment'] = $payment;
            $data['response'] = $response;
        } else {
            $data = [];
        }

        // $data['inbox_subject'] = $inboxText;

        echo json_encode($data);
    }
}
