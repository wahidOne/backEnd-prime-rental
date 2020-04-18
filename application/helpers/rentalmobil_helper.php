<?php


function is_logged_in()
{


    $ci = get_instance();
    if (!$ci->session->userdata('user_email')) {
        $ci->session->set_flashdata(
            'access-block',
            'Anda belum login!!'
        );
        redirect('administrator/sign-in');
    } else {
        $user_level = $ci->session->userdata('user_level');
        $menu = $ci->uri->segment(2);

        $queryMenu = $ci->db->get_where('user_menu', ['menu_uri_segment' => $menu])->row_array();
        $menu_id = $queryMenu['menu_id'];

        $userAccess = $ci->db->get_where('user_access_menu', [
            'access_user_level_id' => $user_level,
            'access_menu_id' => $menu_id
        ]);

        if ($userAccess->num_rows() < 1) {
            redirect('administrator/blocked');
        }
    }


    function check_access($level_id, $menu_id)
    {
        $ci = get_instance();

        // $ci->db->get_where('user_menu', [
        //     'role_id' => $role_id,
        //     'menu_id' => $menu_id
        // ]);
            
        $ci->db->where('access_user_level_id', $level_id);
        $ci->db->where('access_menu_id', $menu_id);
        $result = $ci->db->get('user_access_menu');

        if ($result->num_rows() > 0) {
            return "checked='checked'";
        }
    }
}
