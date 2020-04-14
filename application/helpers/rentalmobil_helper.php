<?php


function is_logged_in()
{


    $ci = get_instance();
    if (!$ci->session->userdata('user_email')) {
        $ci->session->set_flashdata(
            'error',
            'Anda belum login!!'
        );
        redirect('administrator/login');
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
}
