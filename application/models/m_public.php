<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Public extends CI_Model
{
    public function insertData($table, $data = null)
    {
        $this->db->insert($table, $data);
    }
    public function getData($table)
    {
        return $this->db->get($table);
    }

    public function updateData($where = null, $table, $data = null)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function deleteData($where = null, $table)
    {
        $this->db->delete($table, $where);
    }
}
