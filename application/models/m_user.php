<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    public function insertData($data = null)
    {
        $this->db->insert('user', $data);
    }

    public function getUser($where = null)
    {
        // return $this->db->get_where('user', $where)->row_array();
        $this->db->select('user.*, user_level.`level`');
        $this->db->from('user');
        $this->db->join('user_level', 'user_level.level_id
        = user.user_level');
        $this->db->where($where);
        return $this->db->get();
    }
}
