<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
{

    public $public = [
        "templates" => "frontEnd/templates/public/",
        "pages" => "frontEnd/pages/public/"

    ];


    public function index()
    {

        $data['title'] =  "Beranda";

        // data
        $data['cars'] = $this->M_cars->getAllCars()->result_array();
        $data['free_rent'] = $this->M_cars->getCarsWhere(['car_status' => 0])->result_array();

        $templatesPath  = $this->public['templates'];
        $views  = $this->public['pages'];

        $data['componentPath'] = $views . "home/components/";

        $this->load->view($templatesPath .  "header", $data);
        $this->load->view($templatesPath .  "navbar_mobile", $data);
        $this->load->view($templatesPath .  "sidebar", $data);
        $this->load->view($views .  "home/home-page", $data);
        $this->load->view($templatesPath .  "footer", $data);
        $this->load->view($templatesPath .  "end", $data);
    }

    public function cars()
    {
        $data['title'] =  "Mobil";
        $templatesPath  = $this->public['templates'];
        $views  = $this->public['pages'];
        $data['count'] =  $this->db->count_all_results('cars');

        $data['componentPath'] = $views . "car/components/";
        $data['cars'] = $this->M_cars->getAllCars()->result_array();
        $this->load->view($templatesPath .  "header", $data);
        $this->load->view($templatesPath .  "navbar_mobile", $data);
        $this->load->view($templatesPath .  "sidebar", $data);
        $this->load->view($views .  "car/cars-page", $data);
        $this->load->view($templatesPath .  "footer", $data);
        $this->load->view($templatesPath .  "end", $data);
    }
}
