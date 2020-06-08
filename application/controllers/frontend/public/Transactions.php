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
            $data['costumer'] = $costumer;
            $data['user'] = $user;
        }

        $data['title'] =  "Transaksi";
        $templatesPath  = $this->public['templates'];
        $views  = $this->public['pages'];

        $data['componentPath'] = $views . "transactions/components/";
        $data['templatesPath'] = $templatesPath;

        $car = $this->M_cars->getCarWhere(['car_id' => $car_id]);
        $car['car_price'] = number_format($car['car_price'], 2, ',', '.');
        $car['car_fine'] = $car['car_fine'] == "" ? "20.000" : number_format($car['car_fine'], 2, ',', '.');


        $data['car'] = $car;

        $this->load->view($templatesPath .  "header", $data);
        $this->load->view($templatesPath .  "navbar_mobile", $data);
        $this->load->view($templatesPath .  "sidebar", $data);
        $this->load->view($views .  "transactions/rental", $data);
        $this->load->view($templatesPath .  "footer", $data);
        $this->load->view($templatesPath .  "end", $data);
    }
}
