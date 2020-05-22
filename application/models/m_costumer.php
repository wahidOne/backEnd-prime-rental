<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_costumer extends CI_Model
{



    public function  cekCostumer($where = null)
    {

        // return $this->db->get_where('user', $where)->row_array();

        $this->db->select('costumer.*, user.*, user_level.*');
        $this->db->from('user');
        $this->db->join('costumer', 'costumer.cos_user_id
        = user.user_id');
        $this->db->join('user_level', 'user_level.level_id = user.user_level');
        $this->db->where($where);
        return  $this->db->get();
    }
}
