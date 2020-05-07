<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_menu extends CI_Model
{

    public function showMenuToSidebar()
    {
        $user_level = $this->session->userdata('primerental')['user_level'];
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

        // $where = [
        //     ''
        // ]

        $this->db->select('*,user_menu.menu_name, user_menu_type.type_name as submenu_type');
        $this->db->from('user_submenu');
        $this->db->join('user_menu', 'user_menu.menu_id = user_submenu.submenu_menu_id ', 'left');
        $this->db->join('user_menu_type', 'user_menu_type.type_id = user_submenu.submenu_type_id ', 'left');
        $this->db->where_not_in('submenu_active
        ', 0);
        $this->db->order_by('submenu_menu_id ASC ');
        $this->db->order_by('submenu_type_id ASC ');
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


    // datatable menu
    private function _get_datatables_query_menu($column_search, $column_order, $order)
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


    function count_filtered_menu()
    {
        $this->dataTables_menu();
        $query = $this->db->get();
        return $query->num_rows();
    }


    function count_all($table)
    {
        $this->db->from($table);
        return $this->db->count_all_results();
    }

    function get_datatables_menu()
    {
        $this->dataTables_menu();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }


    public function dataTables_menu()
    {
        $this->db->select('*, user_menu_type.type_name as menu_type ');
        $this->db->from('user_menu');
        $this->db->join('user_menu_type', 'user_menu_type.type_id =  user_menu.menu_type_id', 'left');

        $column_order_menu = [null, null, 'menu_name', 'menu_method', 'menu_url', 'menu_type_id'];
        $column_search_menu = ['menu_name', 'menu_method', 'menu_url', 'menu_type_id'];
        $order_menu = ['menu_name' => 'asc'];
        $this->_get_datatables_query_menu($column_search_menu, $column_order_menu, $order_menu);
    }
}
