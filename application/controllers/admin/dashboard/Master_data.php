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
                    <a id="button-info" href="' . site_url('administrator/master-data/get-car/') . '" data-id="' . $c->car_id . '" class="btn btn-outline-info btn-xs" ><i class="fas fa-fw fa-info"></i> Detail</a>
                    <a data-url="' . site_url('administrator/master-data/get-car/') . '" href="" class="btn btn-outline-primary btn-xs ml-2 button-edit" data-id="' . $c->car_id . '"><i class="fas fa-fw fa-pencil"></i> Update</a>
                    <a href="' . base_url('administrator/master-data/delete-car/') . $c->car_id . '" data-name="' .  $c->car_brand . '" class="btn btn-outline-danger btn-xs button-delete  ml-2"><i class="fas fa-fw fa-trash"></i>Delete</a>

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
        $user = $this->M_user->getUser(['user_email' => $this->session->userdata('primerental')['user_email']])->row_array();
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

        echo json_encode(array('status' => $status, 'msg' => $msg));
    }


    public function getCarWhere()
    {
        $car_id = $this->uri->segment(4);

        $car = $this->M_cars->getCarWhere(['car_id' => $car_id]);

        $car['car_date_input'] =  TanggalIndonesia(date('Y-m-d', $car['car_date_input']));

        $data = [
            'car' =>  $car,
            'car_new_price' => "Rp. " . number_format($car['car_price'], 2, ',', '.'),
            'type' => $this->M_public->getData('car_types')->result_array(),
        ];

        // $data['created'] = 

        echo json_encode($data);
    }

    public function updateCar()
    {

        $car_id = $this->input->post('u_car_id');

        $car = $this->M_public->getDataWhere('cars', ['car_id' => $car_id])->row_array();
        $carFirstTimeInput = $car['car_date_input'];

        $result = $this->M_cars->updateCar(['car_id' => $car_id], $carFirstTimeInput);

        if ($result) {
            $data['status'] = "Berhasil";
            $data['message'] = "Data berhasil di ubah!";
        } else {
            // unlink($upload_data['full_path']);
            $data['status'] = "Gagal";
            $data['message'] = "maaf.. data gagal di ubah, silahkan coba kembali.";
        }

        // unlink('./assets/uploads/cars' . $_FILES[$file_name]);


        echo json_encode($data);
        // echo json_encode($data, $car_id);
    }


    public function deleteCar()
    {
        $car_id = $this->uri->segment(4);
        $data['car'] = $this->M_public->getDataWhere('cars', ['car_id' => $car_id])->row_array();


        $oldImage = $data['car']['car_photo'];

        $this->_deleteImage($oldImage);


        $data['result'] = $this->M_public->deleteData(['car_id' => $car_id], 'cars');

        echo json_encode($data);
    }

    private function _deleteImage($oldImage)
    {
        // $product = $this->getById($id);
        if ($oldImage != "default.jpg") {
            return unlink(FCPATH . "assets/uploads/cars/" . $oldImage);
        }
    }



    // tipe mobil 

    public function typesCar()
    {
        $user = $this->M_user->getUser(['user_email' => $this->session->userdata('primerental')['user_email']])->row_array();
        $data = [
            'title' => 'Data Car Types',
            'user' => $user,
        ];
        $backendTemplates = $this->publicData['backendTemplates'];
        $viewsDashboardPath = 'backend/dashboard/';
        $this->load->view($backendTemplates . 'header', $data);
        $this->load->view($backendTemplates . 'topbar', $data);
        $this->load->view($backendTemplates . 'sidebar', $data);
        $this->load->view($viewsDashboardPath . 'master-data/cars/v_data-car-types', $data); //main content
        $this->load->view($backendTemplates . 'footer', $data);
        $this->load->view($viewsDashboardPath . '/plugins/_master-data', $data); //plugins
        $this->load->view($backendTemplates . 'script', $data);
        // costum js
        $this->load->view($viewsDashboardPath . 'master-data/cars/js/js_car_types', $data);
        $this->load->view($backendTemplates . 'end', $data);
    }

    public function showTypesCar()
    {
        $data['type'] = $this->M_public->getData('car_types')->result_array();

        echo json_encode($data);
    }

    public function addTypes()
    {

        $data['type_name'] =  $this->input->post('name');

        $result = $this->M_public->insertData('car_types', $data);

        if ($data) {
            $data['status'] = "Berhasil";
            $data['pesan'] = "good job!.. Data berhasil di tambahkan";
        } else {
            $data['status'] = "Gagal";
            $data['pesan'] = "Opps sorry.. data gagal di masukan, silahkan coba kembali.";
        }

        echo json_encode($data);
    }

    public function detailTypeCar()
    {

        $type_id = $this->uri->segment(4);

        $data['types'] = $this->M_public->getDataWhere('car_types', ['type_id' => $type_id])->row_array();

        echo json_encode($data);
    }

    public function updateTypes()
    {
        $post['type_id'] = $this->input->post('type_id');
        $post['type_name'] = $this->input->post('type_name');


        $result = $this->M_public->updateData(['type_id' => $post['type_id']], 'car_types', $post);

        if ($result) {
            $data['status'] = "Berhasil";
            $data['pesan'] = "good job!.. Data berhasil di tambahkan";
        } else {
            $data['status'] = "Gagal";
            $data['pesan'] = "Opps sorry.. data gagal di masukan, silahkan coba kembali.";
        }

        echo json_encode($data);
    }

    public function deleteTypes()
    {
        $type_id = $this->uri->segment(4);
        $data['types'] = $this->M_public->getDataWhere('car_types', ['type_id' => $type_id])->row_array();

        $data['result'] = $this->M_public->deleteData(['type_id' => $type_id], 'car_types');

        echo json_encode($data);
    }
}
