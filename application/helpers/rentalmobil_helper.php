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
            $submenu = $ci->uri->segment(3);
            $querySubmenu = $ci->db->get_where('user_submenu', ['submenu_method' => $submenu])->row_array();
            $submenu_id = $querySubmenu['submenu_id'];
            $userAccessSubmenu = $ci->db->get_where('user_access_submenu', [
                'access_user_level_id' => $user_level,
                'access_submenu_id' => $submenu_id
            ]);
            if ($userAccessSubmenu->num_rows() < 1) {
                redirect('administrator/blocked');
            }
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

    function check_submenu_access($level_id, $submenu_id)
    {
        $ci = get_instance();
        $ci->db->where('access_user_level_id', $level_id);
        $ci->db->where('access_submenu_id', $submenu_id);
        $result = $ci->db->get('user_access_submenu');

        if ($result->num_rows() > 0) {
            return "checked='checked'";
        }
    }
}


function TanggalIndonesia($date)
{
    $date = date('Y-m-d', strtotime($date));
    if ($date == '0000-00-00')
        return 'Tanggal Kosong';

    $tgl = substr($date, 8, 2);
    $bln = substr($date, 5, 2);
    $thn = substr($date, 0, 4);

    switch ($bln) {
        case 1: {
                $bln = 'Januari';
            }
            break;
        case 2: {
                $bln = 'Februari';
            }
            break;
        case 3: {
                $bln = 'Maret';
            }
            break;
        case 4: {
                $bln = 'April';
            }
            break;
        case 5: {
                $bln = 'Mei';
            }
            break;
        case 6: {
                $bln = "Juni";
            }
            break;
        case 7: {
                $bln = 'Juli';
            }
            break;
        case 8: {
                $bln = 'Agustus';
            }
            break;
        case 9: {
                $bln = 'September';
            }
            break;
        case 10: {
                $bln = 'Oktober';
            }
            break;
        case 11: {
                $bln = 'November';
            }
            break;
        case 12: {
                $bln = 'Desember';
            }
            break;
        default: {
                $bln = 'UnKnown';
            }
            break;
    }

    $hari = date('N', strtotime($date));
    switch ($hari) {
        case 0: {
                $hari = 'Minggu';
            }
            break;
        case 1: {
                $hari = 'Senin';
            }
            break;
        case 2: {
                $hari = 'Selasa';
            }
            break;
        case 3: {
                $hari = 'Rabu';
            }
            break;
        case 4: {
                $hari = 'Kamis';
            }
            break;
        case 5: {
                $hari = "Jum'at";
            }
            break;
        case 6: {
                $hari = 'Sabtu';
            }
            break;
        default: {
                $hari = 'UnKnown';
            }
            break;
    }

    $tanggalIndonesia = $tgl . " " . $bln . " " . $thn;
    // $tanggalIndonesia =  $hari . ", " . $tgl . " " . $bln . " " . $thn;
    return $tanggalIndonesia;
};
