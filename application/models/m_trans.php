<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_trans extends CI_Model
{

    private function get_datatables_query_trans($column_search, $column_order, $order)
    {
        $i = 0;
        foreach ($column_search as $item) { // loop column
            if (@$_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function count_all($table)
    {
        $this->db->from($table);
        return $this->db->count_all_results();
    }


    function count_filtered_rental()
    {
        $this->datatables_rental();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_datatables_rental()
    {
        $this->datatables_rental();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function datatables_rental()
    {
        $this->db->select('rental_trans.*, cars.*, user.*');
        $this->db->from('rental_trans');
        $this->db->join('cars', 'cars.car_id =  rental_trans.rent_car_id');
        $this->db->join('user', 'user.user_id =  rental_trans.rent_user_id');
        $column_order_data = [null, 'rent_date', 'user_name', 'car_brand', 'car_price', 'rent_date_start', 'rent_type', 'rent_status'];

        $column_search_data = ['rent_date', 'user_name', 'car_brand', 'car_price', 'rent_date_start', null, 'rent_status'];

        $order_data = ['rent_date' => 'DESC'];

        $this->get_datatables_query_trans($column_search_data, $column_order_data, $order_data);
    }



    public function getRentalWhere($where)
    {
        $this->db->select('rental_trans.*, cars.car_brand, cars.car_price , user.user_id, user.user_name');
        $this->db->from('rental_trans');
        $this->db->join('cars', 'cars.car_id =  rental_trans.rent_car_id');
        $this->db->join('user', 'user.user_id =  rental_trans.rent_user_id');
        $this->db->where($where);

        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }
}
