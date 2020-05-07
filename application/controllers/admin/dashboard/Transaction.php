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
            $row[] = date('d/m/Y', strtotime($r->rent_date));
            $row[] = '<span class="text-capitalize">' . $r->user_name  . '</span>';
            $row[] = $r->car_brand;
            $row[] = "Rp." . number_format($r->car_price, 0, ',', '.');
            $row[] = date(' d/m/Y', strtotime($r->rent_date_start));
            $row[] = $r->rent_type == 1 ? "Pakai" : "Tidak Pakai";
            $row[] = '<span class="text-capitalize">' . $r->rent_status  . '</span>';
            $row[] = '<div class="d-flex justify-content-center">
                        <a id="btn-info" href="' . site_url('administrator/transaction/get-rent/') . $r->rent_id . '" class="badge badge-info text-dark">
                            <i class="fad fa-fw fa-info"></i>Detail
                        </a>
                        <a data-id="' . $r->rent_id  . '" id="hapus-menu" href="' . site_url('administrator/transaction/delete-rent/')  . '" class="badge badge-success text-dark ml-2">
                            <i class="far fa-fw fa-check"></i> Confirm
                        </a>
                        <a data-id="' . $r->rent_id  . '" id="hapus-menu" href="' . site_url('administrator/transaction/delete-rent/')  . '" class="badge badge-danger text-dark ml-2">
                            <i class="far fa-fw fa-times "></i> Reject
                        </a>
                    </div>
            ';
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
        if (empty($result['rent_proof_pay'])) {
            $result['rent_pay_status'] = "<small class='text-warning' >Belum upload bukti pembayaran</small>";
        } elseif ($result['rent_pay_status'] == 0) {
            $result['rent_pay_status'] = "Menunggu konfirmasi";
        } elseif ($result['rent_pay_status'] == 1) {
            $result['rent_pay_status'] = "Selesai";
        }

        if ($result['rent_date_returned'] == "0000-00-00") {
            $result['rent_date_returned'] = "-";
        } else {
            $result['rent_date_returned'] = date("d F Y", strtotime($result['rent_date_returned']));
        }

        $result['car_price'] = "Rp. " . number_format($result['car_price'], 0, ',', '.');


        $data['response'] = $result;
        echo json_encode($data);
    }
}
