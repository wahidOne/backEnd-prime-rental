<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_data extends CI_Controller
{
    public $publicData = [
        'backendTemplates' => 'backend/templates/public/'
    ];

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    function get_ajax()
    {
        $cars = $this->M_cars->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($cars as $c) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = $c->car_photo != null ? '<img src=' . base_url('assets/uploads/cars/') . $c->car_photo  . ' class=" img-lg rounded-0 h-5  w-auto "  >' : null;
            $row[] = $c->car_brand;
            $row[] = $c->car_no_police;
            $row[] = $c->type_name;
            $row[] = $c->car_price;
            // add html for action
            $row[] = '
            <div class="d-flex justify-content-center ">
                    <a data-url="' . site_url('administrator/master-data/get-car/') . '" href="#" class="btn btn-outline-info btn-xs" data-id="' . $c->car_id . '" ><i class="fas fa-fw fa-info"></i> Detail</a>
                    <a data-url="' . site_url('administrator/master-data/get-car/') . '" href="" class="btn btn-outline-primary btn-xs ml-2 button-edit" data-id="' . $c->car_id . '"><i class="fas fa-fw fa-pencil"></i> Update</a>
                    <a href="' . base_url('administrator/master-data/delete-car/') . $c->car_id . '" data-name="' .  $c->car_brand . '" href="#" class="btn btn-outline-danger btn-xs button-delete  ml-2"><i class="fas fa-fw fa-trash"></i>Delete</a>

            </div>';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->M_cars->count_all(),
            "recordsFiltered" => $this->M_cars->count_filtered(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }


    // Menu
    public function cars()
    {
        $user = $this->M_user->getUser(['user_email' => $this->session->userdata('user_email')])->row_array();
        $data = [
            'title' => 'Data Cars',
            'user' => $user,
            'type_car' => $this->M_public->getData('car_types')->result_array()
        ];
        $backendTemplates = $this->publicData['backendTemplates'];
        $viewsDashboardPath = 'backend/dashboard/';
        $this->load->view($backendTemplates . 'header', $data);
        $this->load->view($backendTemplates . 'topbar', $data);
        $this->load->view($backendTemplates . 'sidebar', $data);
        $this->load->view($viewsDashboardPath . 'master-data/cars/v_data-cars', $data); //main content
        $this->load->view($backendTemplates . 'footer', $data);
        $this->load->view($viewsDashboardPath . '/plugins/_master-data', $data); //plugins
        $this->load->view($backendTemplates . 'script', $data);
        // costum js
        $this->load->view($viewsDashboardPath . 'master-data/cars/js/js_cars', $data);
        $this->load->view($backendTemplates . 'end', $data);
    }

    public function AddCar()
    {

        $file_name = 'image';

        $config['upload_path'] = './assets/uploads/cars';
        $config['allowed_types'] = 'gif|jpg|png|doc|txt';
        // $config['max_size'] = 1024 * 8;
        $config['file_name'] = 'car' . time();

        $this->load->library('upload', $config);


        if (empty($_FILES['image']['name']) == true) {
            $status = "Gagal";
            $msg = "Gambar Belum di pilih";
        } else {
            if (!$this->upload->do_upload($file_name)) {
                $status = "Gagal";
                $msg = $this->upload->display_errors('', '');
            } else {
                // $data = $this->upload->data();
                $upload_data = $this->upload->data();
                $image = $upload_data['file_name'];
                $result = $this->M_cars->saveCar($image);
                if ($result) {
                    $status = "Berhasil";
                    $msg = "yeah.. Data berhasil di tambahkan";
                } else {
                    unlink($upload_data['full_path']);
                    $status = "Gagal";
                    $msg = "maaf.. data gagal di masukan, silahkan coba kembali.";
                }
            }
        }


        // @unlink($_FILES[$file_name]);

        echo json_encode(array('status' => $status, 'msg' => $msg, 'result' => $result));
    }


    public function getCarWhere()
    {
        $car_id = $this->uri->segment(4);

        $data = [
            'car' =>  $this->M_public->getDataWhere('cars', ['car_id' => $car_id])->row_array(),
            'type' => $this->M_public->getData('car_types')->result_array()
        ];
        echo json_encode($data);
    }

    public function updateCar()
    {

        $car_id = $this->input->post('car_id');

        $file_name = 'image';

        $car = $this->M_public->getDataWhere('cars', ['car_id' => $car_id])->row_array();

        $carFirstTimeInput = $car['car_date_input'];

        $config['upload_path'] = './assets/uploads/cars';
        $config['allowed_types'] = 'gif|jpg|png|doc|txt';
        // $config['max_size'] = 1024 * 8;
        $config['file_name'] = 'car-update-' . time();

        $this->load->library('upload', $config);

        if ($this->upload->do_upload($file_name)) {
            $upload_data = $this->upload->data();
            unlink('assets/uploads/cars/' . $this->input->post('old_image', TRUE));
            $image = $upload_data['file_name'];
        } else {
            $image = $this->input->post('old_image', TRUE);
            // $result = $this->M_cars->updateCar($image);
        }


        $result = $this->M_cars->updateCar($image, ['car_id' => $car_id], $carFirstTimeInput);

        if ($result) {
            $status = "Berhasil";
            $msg = "yeah.. Data berhasil di tambahkan";
        } else {
            unlink($upload_data['full_path']);
            $status = "Gagal";
            $msg = "maaf.. data gagal di masukan, silahkan coba kembali.";
        }

        // unlink('./assets/uploads/cars' . $_FILES[$file_name]);


        echo json_encode(array('image' => $image, 'status' => $status, 'msg' => $msg, 'result' => $result));
        // echo json_encode(['data' => 'hayy']);
    }


    public function deleteCar()
    {
        $car_id = $this->uri->segment(4);
        $data['car'] = $this->M_public->getDataWhere('cars', ['car_id' => $car_id])->row_array();

        $data['result'] = $this->M_public->deleteData(['car_id' => $car_id], 'cars');

        echo json_encode($data);
    }
}
