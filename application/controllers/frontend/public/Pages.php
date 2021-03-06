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

        if ($this->session->userdata('primerental_user') != NULL) {
            $user = $this->M_user->getUser(['user_email' => $this->session->userdata('primerental_user')['user_email']]);
            if ($user->num_rows() > 0) {
                $data['user'] = $user->row_array();
            } else {
                $data['user'] = [];
            }
        }


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

        $data['themeNavbar'] = "dark";
        $data['themeHamburger'] = "light";
        $data['linkColor'] = "primary-70";


        if ($this->session->userdata('primerental_user') != NULL) {
            $user = $this->M_user->getUser(['user_email' => $this->session->userdata('primerental_user')['user_email']]);
            if ($user->num_rows() > 0) {
                $data['user'] = $user->row_array();
            } else {
                $data['user'] = [];
            }
        }


        $data['componentPath'] = $views . "car/components/";
        $data['templatesPath'] = $templatesPath;
        $data['cars'] = $this->M_cars->getAllCars()->result_array();
        $data['car_type'] = $this->M_public->getData('car_types')->result_array();
        $this->load->view($templatesPath .  "header", $data);
        $this->load->view($templatesPath .  "navbar_mobile", $data);
        $this->load->view($templatesPath .  "sidebar", $data);
        $this->load->view($views .  "car/cars-page", $data);
        $this->load->view($templatesPath .  "footer", $data);
        $this->load->view($templatesPath .  "end", $data);
    }

    public function detailCar()
    {
        $car_id = $this->uri->segment(3);

        $car = $this->M_cars->getCarWhere(['car_id' => $car_id]);
        // $data['similiar_car'] = $this->M_cars->getCarsWhere(['car_type_id' => $car['car_type_id']])->result_array();

        if ($this->session->userdata('primerental_user') != NULL) {
            $user = $this->M_user->getUser(['user_email' => $this->session->userdata('primerental_user')['user_email']]);
            if ($user->num_rows() > 0) {
                $data['user'] = $user->row_array();
            } else {
                $data['user'] = [];
            }
        }


        $data['themeNavbar'] = "light";
        $data['themeHamburger'] = "dark";
        $data['linkColor'] = "primary";

        $data['cars'] = $this->M_cars->getCarsWhere([
            'car_type_id' => $car['car_type_id'],
        ]);
        $data['car'] = $car;
        $data['title'] =  $car['car_brand'];

        $templatesPath  = $this->public['templates'];
        $views  = $this->public['pages'];
        $data['componentPath'] = $views . "car/components/";
        $data['templatesPath'] = $templatesPath;
        $this->load->view($templatesPath .  "header", $data);
        $this->load->view($templatesPath .  "navbar_mobile", $data);
        $this->load->view($templatesPath .  "sidebar", $data);
        $this->load->view($views .  "car/detail-page", $data);
        $this->load->view($templatesPath .  "footer", $data);
        $this->load->view($templatesPath .  "end", $data);
    }


    public function about()
    {


        if ($this->session->userdata('primerental_user') != NULL) {
            $user = $this->M_user->getUser(['user_email' => $this->session->userdata('primerental_user')['user_email']]);
            if ($user->num_rows() > 0) {
                $data['user'] = $user->row_array();
            } else {
                $data['user'] = [];
            }
        }




        $data['title'] =  "Tentang Kami";
        $data['themeNavbar'] = "dark";
        $data['themeHamburger'] = "light";
        $data['linkColor'] = "primary-70";
        $templatesPath  = $this->public['templates'];
        $views  = $this->public['pages'];

        $data['componentPath'] = $views . "about/components/";
        $data['templatesPath'] = $templatesPath;
        $this->load->view($templatesPath .  "header", $data);
        $this->load->view($templatesPath .  "navbar_mobile", $data);
        $this->load->view($templatesPath .  "sidebar", $data);
        $this->load->view($views .  "about/about-page", $data);
        $this->load->view($templatesPath .  "footer", $data);
        $this->load->view($templatesPath .  "end", $data);
    }

    public function contact()
    {

        if ($this->session->userdata('primerental_user') != NULL) {
            $user = $this->M_user->getUser(['user_email' => $this->session->userdata('primerental_user')['user_email']]);
            if ($user->num_rows() > 0) {
                $data['user'] = $user->row_array();
            } else {
                $data['user'] = [];
            }
        }
        $data['title'] =  "Kontak Kami";
        $data['themeNavbar'] = "dark";
        $data['themeHamburger'] = "light";
        $data['linkColor'] = "primary-70";
        $templatesPath  = $this->public['templates'];
        $views  = $this->public['pages'];

        $data['componentPath'] = $views . "contact/components/";
        $data['templatesPath'] = $templatesPath;
        $this->load->view($templatesPath .  "header", $data);
        $this->load->view($templatesPath .  "navbar_mobile", $data);
        $this->load->view($templatesPath .  "sidebar", $data);
        $this->load->view($views .  "contact/contact-page", $data);
        $this->load->view($templatesPath .  "footer", $data);
        $this->load->view($templatesPath .  "end", $data);
    }
}
