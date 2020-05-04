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

    public function getAdmin($where = null)
    {
        // return $this->db->get_where('user', $where)->row_array();
        $this->db->select('user.*, user_level.`level`, admin.*');
        $this->db->from('user');
        $this->db->join('user_level', 'user_level.level_id
        = user.user_level');
        $this->db->join('admin', 'admin.admin_user_id
        = user.user_id');
        $this->db->where($where);
        return $this->db->get();
    }

    public function getAllUser()
    {
        // return $this->db->get_where('user', $where)->row_array();
        $this->db->select('user.*, user_level.`level` as user_level');
        $this->db->from('user');
        $this->db->join('user_level', 'user_level.level_id
        = user.user_level');
        $query =  $this->db->get();
        if ($query->num_rows() != 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    // public function update($image) {

    public function update()
    {

        $old_image = $this->input->post('user_old_img');
        $id = $this->input->post('user_id');
        $user_name = $this->input->post('user_name');
        $user_email = $this->input->post('user_email');
        $admin_name = $this->input->post('admin_name');
        $admin_phone = $this->input->post('admin_phone');
        $admin_address = $this->input->post('admin_address');

        if (!empty($_FILES["user_photo"]["name"])) {
            if ($old_image != 'default.png') {
                $image = $this->_uploadImage();
                unlink(FCPATH . "assets/uploads/ava/" .  $this->input->post('user_old_img'));
            } else {
                $image = $this->_uploadImage();
            }
        } else {
            $image = $old_image;
        }

        // var_dump($this->input->post('user_photo'));
        // die();



        $this->db->set('a.user_name', $user_name);
        $this->db->set('a.user_email', $user_email);
        $this->db->set('a.user_photo', $image);
        $this->db->where('a.user_id',  $id);

        $this->db->update('user as a');


        $this->db->set('b.admin_name', $admin_name);
        $this->db->set('b.admin_phone', $admin_phone);
        $this->db->set('b.admin_address', $admin_address);
        $this->db->where('b.admin_user_id', $id);
        $this->db->update('admin as b');
    }


    private function _uploadImage()
    {
        $config['upload_path']          = './assets/uploads/ava/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = 'ava-' . time();
        $config['overwrite']            = true;
        // $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('user_photo')) {
            return $this->upload->data("file_name");
        }


        return "default.png";
    }


    public function getUserWhere($where = null)
    {
        $this->db->select('user.*, user_level.`level`');
        $this->db->from('user');
        $this->db->join('user_level', 'user_level.level_id
        = user.user_level');
        $this->db->where($where);
        $query = $this->db->get();

        if ($query->num_rows() != 0) {
            return $query;
        } else {
            return false;
        }
    }

    public function getGeneralUsers()
    {
        $this->db->select('user.*, user_level.`level` as user_level');
        $this->db->from('user');
        $this->db->join('user_level', 'user_level.level_id
        = user.user_level');
        $this->db->where('user_level', 3);
        $query = $this->db->get();

        if ($query->num_rows() != 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function getAdminUsers()
    {

        $where = [
            'user_level < ' => 5,
            'user_level !=' => 3
        ];

        $this->db->select('user.*, user_level.*, admin.*');
        $this->db->from('user');
        $this->db->join('admin', 'admin.admin_user_id
        = user.user_id');
        $this->db->join('user_level', 'user_level.level_id
        = user.user_level');
        $this->db->where($where);


        // $this->db->where('user_level', 2);
        // $this->db->where('user_level', 4);
        $query = $this->db->get();

        if ($query->num_rows() != 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getAdminWhere($where)
    {
        $this->db->select('user.*, user_level.*, admin.*');
        $this->db->from('user');
        $this->db->join('admin', 'admin.admin_user_id
        = user.user_id');
        $this->db->join('user_level', 'user_level.level_id
        = user.user_level');
        $this->db->where($where);


        // $this->db->where('user_level', 2);
        // $this->db->where('user_level', 4);
        $query = $this->db->get();

        if ($query->num_rows() != 0) {
            return $query;
        } else {
            return false;
        }
    }


    public function getDrivers()
    {
        $this->db->select('user.*, user_level.`level` as user_level, drivers.*');
        $this->db->from('user');
        $this->db->join('drivers', 'drivers.driver_user_id
        = user.user_id');
        $this->db->join('user_level', 'user_level.level_id
        = user.user_level');
        $this->db->where('user_level', 7);
        $query = $this->db->get();

        if ($query->num_rows() != 0) {
            return $query->result();
        } else {
            return "no admin";
        }
    }
    public function getDriversWhere($where)
    {

        $this->db->select('user.*, user_level.`level` as user_level, drivers.*');
        $this->db->from('user');
        $this->db->join('drivers', 'drivers.driver_user_id
        = user.user_id');
        $this->db->join('user_level', 'user_level.level_id
        = user.user_level');
        $this->db->where($where);
        $query = $this->db->get();

        if ($query->num_rows() != 0) {
            return $query;
        } else {
            return "no driver";
        }
    }
}
