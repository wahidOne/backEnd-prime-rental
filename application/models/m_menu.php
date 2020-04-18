<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_menu extends CI_Model
{

    public function showMenuToSidebar()
    {
        $user_level = $this->session->userdata('user_level');

        // $queryMenu = "SELECT `user_menu`.`menu_id`, `menu_type_id`
        // FROM `user_menu` JOIN `user_access_menu` 
        // ON `user_menu`.`menu_id` = `user_access_menu`.`access_menu_id`
        // FROM `user_menu` JOIN `user_menu_type` 
        // ON `user_menu`.`menu_type_id` = `user_menu_type`.`type_id`
        // WHERE `user_access_menu`.`access_user_level_id` = $role_id
        // AND `menu_type_id` = '1'
        // ORDER BY `user_access_menu`.`access_menu_id` ASC
        // ";
        $this->db->select('*');
        $this->db->from('user_menu');
        $this->db->join('user_access_menu', 'user_access_menu.access_menu_id = user_menu.menu_id', 'left');
        $this->db->join('user_menu_type', 'user_menu_type.type_id =  user_menu.menu_type_id', 'left');
        $this->db->where('user_access_menu.access_user_level_id', $user_level);
        $this->db->where('menu_type_id', 1);
        $this->db->order_by('user_access_menu.access_menu_id', 'asc');
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query->result_array();
        } else {
            return false;
        }

        // return $this->db->query($queryMenu)->result_array();
    }

    public function getMenu()
    {
        $this->db->select('*,user_menu_type.type_name as menu_type ');
        $this->db->from('user_menu');
        $this->db->join('user_menu_type', 'user_menu_type.type_id =  user_menu.menu_type_id', 'left');
        $query = $this->db->get();

        if ($query->num_rows() != 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function ShowMenuById($where = null)
    {
        $this->db->select('user_menu.*, user_menu_type.type_name as menu_type ');
        $this->db->from('user_menu');
        $this->db->join('user_menu_type', 'user_menu_type.type_id =  user_menu.menu_type_id');
        $this->db->where($where);
        $query =  $this->db->get();
        if ($query->num_rows() != 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function menuWhere($where = null)
    {
        return $this->db->get_where('user_menu', $where);
    }


    public function getSubmenu()
    {
        $this->db->select('*,user_menu.menu_name');
        $this->db->from('user_submenu');
        $this->db->join('user_menu', 'user_menu.menu_id = user_submenu.submenu_menu_id ', 'left');
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getSubmenuWhere($where = null)
    {
        $this->db->select('*,user_menu.menu_name');
        $this->db->from('user_submenu');
        $this->db->join('user_menu', 'user_menu.menu_id = user_submenu.submenu_menu_id ', 'left');
        $this->db->where($where);
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }
}
