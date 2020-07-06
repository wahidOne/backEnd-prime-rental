<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_inbox extends CI_Model
{

    public function getInbox($where = null)
    {
        // return $this->db->get_where('user', $where)->row_array();
        $this->db->select('user.*, user_level.`level`, inbox.*, clients.*');
        $this->db->from('user');
        $this->db->join('user_level', 'user_level.level_id
        = user.user_level');
        $this->db->join('clients', 'clients.client_user_id =  user.user_id');
        $this->db->join('inbox', 'inbox.inbox_to = user.user_id');
        $this->db->where($where);
        $this->db->order_by('inbox_created_at', "DESC");
        return $this->db->get();
    }
}
