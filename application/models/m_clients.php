<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_clients extends CI_Model
{


    public function getClients()
    {
        $this->db->select('clients.*, user.*, user_level.*');
        $this->db->from('user');
        $this->db->join('clients', 'clients.client_user_id
        = user.user_id');
        $this->db->join('user_level', 'user_level.level_id = user.user_level');
        $query =  $this->db->get();
        if ($query->num_rows() != 0) {
            return $query;
        } else {
            return false;
        }
    }


    public function checkClient($where = null)
    {

        $this->db->select('clients.*, user.*, user_level.*');
        $this->db->from('user');
        $this->db->join('clients', 'clients.client_user_id
        = user.user_id');
        $this->db->join('user_level', 'user_level.level_id = user.user_level');
        $this->db->where($where);
        return  $this->db->get();
    }
}
