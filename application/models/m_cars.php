<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_cars extends CI_Model
{

    // start datatables
    var $column_order = array(null, null,  'car_brand', 'car_no_police', 'type_name', 'car_price'); //set column field database for datatable orderable
    var $column_search = array('car_brand', 'car_no_police', 'type_name', 'car_price'); //set column field database for datatable searchable
    var $order = array('car_id' => 'asc'); // default order


    private function _get_datatables_query()
    {
        $this->db->select('*');
        $this->db->from('cars');
        $this->db->join('car_types', 'car_types.type_id =  cars.car_type_id');
        $i = 0;
        foreach ($this->column_search as $car) { // loop column
            if (@$_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($car, $_POST['search']['value']);
                } else {
                    $this->db->or_like($car, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }


    function get_datatables()
    {
        $this->_get_datatables_query();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all()
    {
        $this->db->from('cars');
        return $this->db->count_all_results();
    }
    // end datatables

    public function getAllCars()
    {
        $this->db->select('*');
        $this->db->from('cars');
        $this->db->join('car_types', 'car_types.type_id =  cars.car_type_id');
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getCarWhere($where = null)
    {
        $this->db->select('*');
        $this->db->from('cars');
        $this->db->join('car_types', 'car_types.type_id =  cars.car_type_id');
        $this->db->where($where);
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function saveCar($image)
    {
        $data = [
            'car_brand' => $this->input->post('brand', true),
            'car_no_police' => $this->input->post('no_police', true),
            'car_type_id' => $this->input->post('type_id', true),
            'car_price' => $this->input->post('price', true),
            'car_fuel' => $this->input->post('fuel', true),
            'car_transmission' => $this->input->post('transmission', true),
            'car_capacity' => $this->input->post('capacity', true),
            'car_desc' => $this->input->post('desc', true),
            'car_status' => "bebas",
            'car_date_input' => time(),
            'car_date_update' => "",
            'car_photo' => $image
        ];

        $this->db->insert('cars', $data);

        return $data;
    }


    public function updateCar($where = null, $dateInput = null)
    {

        if (!empty($_FILES["newimage"]["name"])) {
            $image = $this->_uploadImage();
            unlink(FCPATH . "assets/uploads/cars/" .  $this->input->post('u_old_image'));
        }

        if (empty($_FILES["newimage"]["name"])) {
            $image = $this->input->post('u_old_image');
        }

        $data = [
            'car_id' => $this->input->post('u_car_id', true),
            'car_brand' => $this->input->post('u_brand', true),
            'car_no_police' => $this->input->post('u_no_police', true),
            'car_type_id' => $this->input->post('u_type_id', true),
            'car_price' => $this->input->post('u_price', true),
            'car_fuel' => $this->input->post('u_fuel', true),
            'car_transmission' => $this->input->post('u_transmission', true),
            'car_capacity' => $this->input->post('u_capacity', true),
            'car_desc' => $this->input->post('u_desc', true),
            'car_date_input' => $dateInput,
            'car_date_update' => time(),
            'car_photo' => $image
        ];

        $this->db->update('cars', $data, $where);

        return ['result'];
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './assets/uploads/cars/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = 'car-' . time() . '-prime';
        $config['overwrite']            = true;
        // $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('newimage')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }
}
