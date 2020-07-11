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
            $row[] = $c->car_status ==  1 ? '<span class="badge badge-warning">Di sewa</span>' : '<span class="badge badge-success text-dark ">Bebas</span>';
            // add html for action
            $row[] = '
            <div class="d-flex justify-content-center ">
                    <a id="button-info" href="' . site_url('administrator/master-data/get-car/') . '" data-id="' . $c->car_id . '" class="badge badge-info text-dark"><i class="fas fa-fw fa-info"></i> Detail</a>
                    <a data-url="' . site_url('administrator/master-data/get-car/') . '" href="" class="badge badge-primary text-dark ml-2 button-edit" data-id="' . $c->car_id . '"><i class="fas fa-fw fa-pencil"></i> Update</a>
                    <a href="' . base_url('administrator/master-data/delete-car/') . $c->car_id . '" data-name="' .  $c->car_brand . '" class="badge badge-danger  button-delete  ml-2"><i class="fas fa-fw fa-trash"></i>Delete</a>

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



    public function viewDataDrivers()
    {
        $user = $this->M_user->getUser(['user_email' => $this->session->userdata('primerental')['user_email']])->row_array();
        $data = [
            'title' => 'Data Drivers',
            'user' => $user,
        ];

        $backendTemplates = $this->publicData['backendTemplates'];
        $viewsDashboardPath = 'backend/dashboard/';
        $this->load->view($backendTemplates . 'header', $data);
        $this->load->view($backendTemplates . 'topbar', $data);
        $this->load->view($backendTemplates . 'sidebar', $data);
        $this->load->view($viewsDashboardPath . 'master-data/driver/v_driver', $data); //main content
        $this->load->view($backendTemplates . 'footer', $data);
        $this->load->view($viewsDashboardPath . '/plugins/_master-data', $data); //plugins
        $this->load->view($backendTemplates . 'script', $data);
        // costum js
        $this->load->view($viewsDashboardPath . 'master-data/driver/js/js_driver', $data);
        $this->load->view($backendTemplates . 'end', $data);
    }


    public function loadDataDrivers()
    {
        $drivers = $this->M_user->getDrivers();
        foreach ($drivers as $driver) {
            $driver->user_created = date('d F Y', $driver->user_created);
            $row[] = $driver;
        }

        $data['drivers'] = $row;

        echo json_encode($data);
    }

    public function insertDataDrivers()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');

        $postData = json_decode(file_get_contents('php://input'), true);

        foreach ($postData as $key => $val) {
            $val = filter_var($val, FILTER_SANITIZE_STRING); // Remove all HTML tags from string
            $postData[$key] = $val;
        }

        $user_id = getAutoNumber('user', 'user_id', 'user-', 9);

        $user_email = htmlspecialchars($postData['user_email']);
        $user_name = htmlspecialchars($postData['user_name']);
        $password = password_hash($postData['user_password'], PASSWORD_DEFAULT);
        $cekdata = $this->db->get_where('user', ['user_email' => $user_email]);

        if ($cekdata->num_rows() == 0) {
            $res['is_email_already'] = false;
            $res['the_user'] = $cekdata->row_array();
            $res['the_row'] = $cekdata->num_rows();


            $datauser = [
                'user_id' => $user_id,
                'user_name' => $user_name,
                'user_email' => $user_email,
                'user_password' => $password,
                'user_status' => "online",
                'user_level' => 7,
                'user_is_activation' => 1,
                'user_photo' => "default.png",
                'user_created' => time(),
            ];

            $datadriver = [
                'driver_id' => getAutoNumber('drivers', 'driver_id', 'D-', 5),
                'driver_user_id' => $datauser['user_id'],
                'driver_name' => $postData['driver_name'],
                'driver_phone' => $postData['driver_phone'],
                'driver_ID_number' => $postData['driver_ID_number'],
                'driver_status' => 0,
            ];



            $result = $this->M_public->insertData('user', $datauser);
            // $result = 1;

            if ($result > 0) {
                $this->M_public->insertData('drivers', $datadriver);
                $res['status'] = true;
                $res['message'] = 'Berhasil menambahkan data supir';
                $res['user'] = $datauser;
                $res['driver'] = $datadriver;
            } else {
                $res['status'] = false;
                $res['message'] = 'Gagal menambahkan data supir, Silahkan Coba Lagi';
            }
        } else {
            $res['status'] = false;
            $res['is_email_already'] = true;
            $res['message'] = 'Email yang dimasukan sudah tersedia!';
        }
        $data['res']  = $res;
        echo json_encode($data);
    }

    public function AutoinsertDataDrivers()
    {


        $user_id = getAutoNumber('user', 'user_id', 'user-', 9);
        $user_email = getAutoNumber('user', 'user_email', 'prime.driver', 15);
        $driver_name = getAutoNumber('drivers', 'driver_name', 'driver-', 10);

        $datauser = [
            'user_id' => $user_id,
            'user_name' => $driver_name,
            'user_email' => $user_email . "@gmail.com",
            'user_password' => password_hash($driver_name, PASSWORD_DEFAULT),
            'user_status' => "online",
            'user_level' => 7,
            'user_is_activation' => 1,
            'user_photo' => "default.png",
            'user_created' => time(),
        ];

        $datadriver = [
            'driver_id' => getAutoNumber('drivers', 'driver_id', 'D-', 5),
            'driver_user_id' => $user_id,
            'driver_name' => $driver_name,
            'driver_phone' => "+628-0000-0000-0000",
            'driver_ID_number' => time(),
            'driver_status' => 0,
        ];

        $result = $this->M_public->insertData('user', $datauser);
        // $result = 1;

        if ($result > 0) {
            $this->M_public->insertData('drivers', $datadriver);
            $res['status'] = true;
            $res['message'] = 'Berhasil menambahkan data supir baru';
            $res['user'] = $datauser;
            $res['driver'] = $datadriver;
        } else {
            $res['status'] = false;
            $res['message'] = 'Gagal menambahkan data supir, Silahkan Coba Lagi';
        }

        $data['response'] = $res;
        echo json_encode($data);
    }

    public function getDriversDetail()
    {


        $user_id = $this->uri->segment(4);

        $driver = $this->M_user->getDriversWhere(['user_id' => $user_id])->row_array();

        $driver['user_created'] =  date('F, d Y', $driver['user_created']);

        $res['driver'] = $driver;
        $res['status'] = true;
        $data['response'] = $res;

        echo json_encode($data);
    }

    public function updateDataDriver()
    {


        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');

        $postData = json_decode(file_get_contents('php://input'), true);

        foreach ($postData as $key => $val) {
            $val = filter_var($val, FILTER_SANITIZE_STRING); // Remove all HTML tags from string
            $postData[$key] = $val;
        }

        $user_id = $postData['user_id'];

        $res['user_id'] = $user_id;
        $res['post'] = $postData;

        $datauser = [
            'user_name' => $postData['user_name'],
        ];

        $datadriver = [
            'driver_name' => $postData['driver_name'],
            'driver_phone' => $postData['driver_phone'],
            'driver_ID_number' => $postData['driver_ID_number'],
        ];

        // $result = true;
        $this->M_public->updateData(['user_id' => $user_id], 'user', $datauser);
        $this->M_public->updateData(['driver_user_id' => $user_id], 'drivers', $datadriver);

        $data['data'] = $res;
        $data['status'] = true;
        $data['pesan'] = "Berhasil mengubah data supir!";


        echo json_encode($data);
    }

    public function deleteDriver()
    {
        $user_id = $this->uri->segment(4);
        // $data['types'] = $this->M_public->getDataWhere('car_types', ['type_id' => $type_id])->row_array();
        // $this->M_public->deleteData(['user_id' => $user_id], 'user');
        // $this->M_public->deleteData(['driver_user_id' => $user_id], 'user');

        $user = $this->M_public->getDataWhere('user', ['user_id' => $user_id])->row_array();

        if ($this->M_public->deleteData(['user_id' => $user_id], 'user') &&  $this->M_public->deleteData(['driver_user_id' => $user_id], 'drivers')) {
            if ($user['user_photo'] != "default.png") {
                unlink(FCPATH . './assets/uploads/ava/' . $user['user_photo']);
            }
            $res['status'] = true;
            $res['message'] = "Berhasil menghapus data!";
        } else {
            $res['status'] = false;
            $res['message'] = "Oopps..gagal menghapus data driver";
        }

        $data['res'] = $res;

        echo json_encode($data);
    }
}
