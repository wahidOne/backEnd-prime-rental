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


        // $this->db->select('p_item.*, p_category.name as category_name, p_unit.name as unit_name');
        // $this->db->from('p_item');
        // $this->db->join('p_category', 'p_item.category_id = p_category.category_id');
        // $this->db->join('p_unit', 'p_item.unit_id = p_unit.unit_id');
        // $this->db->select('*');
        // $this->db->from('mobil');
        // $this->db->join('tipe', 'tipe.tipe_id =  mobil.id_tipe_mobil', 'left');
        // $this->getAllCars();
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

    // public function getAllCars()
    // {
    //     $this->db->select('*');
    //     $this->db->from('cars');
    //     $this->db->join('tipe_mobil', 'tipe_mobil.id_tipe =  mobil.id_tipe_mobil', 'left');
    //     $query = $this->db->get();
    //     if ($query->num_rows() != 0) {
    //         return $query->result_array();
    //     } else {
    //         return false;
    //     }
    // }

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
}
