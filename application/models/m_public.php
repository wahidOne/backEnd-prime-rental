<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Public extends CI_Model
{
    public function insertData($table, $data = null)
    {
        $this->db->insert($table, $data);

        return $this->db->affected_rows();
    }
    public function getData($table)
    {
        return $this->db->get($table);
    }

    public function getDataWhere($table, $where = null)
    {
        return $this->db->get_where($table, $where);
    }

    public function updateData($where = null, $table, $data)
    {
        $this->db->where($where);
        $this->db->update($table, $data);

        return $this->db->affected_rows();
    }

    public function deleteData($where = null, $table)
    {
        $this->db->delete($table, $where);

        return $this->db->affected_rows();
    }
}
