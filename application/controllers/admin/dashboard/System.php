<?php
defined('BASEPATH') or exit('No direct script access allowed');

class System extends CI_Controller
{


    public $publicData = [
        'backendTemplates' => 'backend/templates/public/'
    ];

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }


    // Menu
    public function menu()
    {
        $user = $this->M_user->getUser(['user_email' => $this->session->userdata('user_email')])->row_array();
        $menu = $this->M_menu->getMenu();

        $data = [
            'title' => 'Menu Manegements',
            'user' => $user,
            'menu' => $menu,
            'menu_type' => $this->M_public->getData('user_menu_type')->result_array()

        ];
        $backendTemplates = $this->publicData['backendTemplates'];
        $viewsDashboardPath = 'backend/dashboard/';
        $this->load->view($backendTemplates . 'header', $data);
        $this->load->view($backendTemplates . 'topbar', $data);
        $this->load->view($backendTemplates . 'sidebar', $data);
        $this->load->view($viewsDashboardPath . 'system-management/v_menu', $data); //main content
        $this->load->view($backendTemplates . 'footer', $data);
        $this->load->view($viewsDashboardPath . '/plugins/_menu', $data); //plugins
        $this->load->view($backendTemplates . 'script', $data);
        // costum js
        $this->load->view($viewsDashboardPath . 'system-management/js/js_menu', $data);
        $this->load->view($backendTemplates . 'end', $data);
    }

    public function tambahMenu()
    {
        $menu_name = $this->input->post('menu_name');
        $menu_method = $this->input->post('menu_method');
        $menu_url = $this->input->post('menu_url');
        $menu_slug = $this->input->post('menu_slug');
        $menu_icon = $this->input->post('menu_icon');
        $menu_type = $this->input->post('menu_type');

        $data = [
            'menu_name' => $menu_name,
            'menu_method' => $menu_method,
            'menu_url' => $menu_url,
            'menu_uri_segment' => $menu_slug,
            'menu_icon' => $menu_icon,
            'menu_type_id' => $menu_type
        ];
        $this->M_public->insertData('user_menu', $data);

        $this->session->set_flashdata('pesan-tambah-menu', "Menu baru berhasil di tambahkan ");

        redirect('administrator/system-management/menu');
    }

    public function ubahMenu()
    {
        $menu_id = $this->input->post('menu_id');
        $menu_name = $this->input->post('menu_name');
        $menu_method = $this->input->post('menu_method');
        $menu_url = $this->input->post('menu_url');
        $menu_slug = $this->input->post('menu_slug');
        $menu_icon = $this->input->post('menu_icon');
        $menu_type = $this->input->post('menu_type');

        $data = [
            'menu_id' => $menu_id,
            'menu_name' => $menu_name,
            'menu_method' => $menu_method,
            'menu_url' => $menu_url,
            'menu_uri_segment' => $menu_slug,
            'menu_icon' => $menu_icon,
            'menu_type_id' => $menu_type
        ];
        $this->M_public->updateData(['menu_id' => $menu_id], 'user_menu', $data);

        $this->session->set_flashdata('pesan-ubah-menu', "Menu berhasil di ubah ");

        redirect('administrator/system-management/menu');
    }

    public function getMenuWhere()
    {
        // $menuId = $this->uri->segment(4);
        $data = $this->M_menu->ShowMenuById(['menu_id' => $this->uri->segment(5)]);
        echo json_encode($data);
    }

    public function deleteMenu()
    {
        $menu = $this->M_menu->ShowMenuById(['menu_id' => $this->uri->segment(4)]);
        $this->M_public->deleteData(['menu_id' => $this->uri->segment(4)], 'user_menu');
        $this->session->set_flashdata(
            'pesan-hapus-menu',
            'Berhasil menghapus menu ' . $menu['menu_name'] . '!'
        );
        redirect('administrator/system-management/menu');
    }

    // SubMenu 


    public function showSubmenu()
    {
        $user = $this->M_user->getUser(['user_email' => $this->session->userdata('user_email')])->row_array();

        $submenu = $this->M_menu->getSubmenu();
        $menu = $this->M_menu->getMenu();
        $data = [
            'title' => 'Submenu Manegements',
            'user' => $user,
            'submenu' => $submenu,
            'menu' => $menu
        ];


        $this->form_validation->set_rules(
            'name',
            'name',
            'required|trim',
            [
                'required' => 'Masukan nama submenu!'
            ]
        );
        $this->form_validation->set_rules(
            'method',
            'Method',
            'required|trim',
            [
                'required' => 'Masukan method submenunya!'
            ]
        );
        $this->form_validation->set_rules(
            'icon',
            'Icon',
            'required|trim',
            [
                'required' => 'Tentukan Icon!'
            ]
        );
        $this->form_validation->set_rules(
            'menu_id',
            'Menu',
            'required|trim',
            [
                'required' => 'Tentukan Menu!'
            ]
        );

        $backendTemplates = $this->publicData['backendTemplates'];
        $viewsDashboardPath = 'backend/dashboard/';
        if ($this->form_validation->run() == false) {
            $this->load->view($backendTemplates . 'header', $data);
            $this->load->view($backendTemplates . 'topbar', $data);
            $this->load->view($backendTemplates . 'sidebar', $data);
            $this->load->view($viewsDashboardPath . 'system-management/v_submenu', $data); //main content
            $this->load->view($backendTemplates . 'footer', $data);
            $this->load->view($viewsDashboardPath . '/plugins/_menu', $data); //plugins
            $this->load->view($backendTemplates . 'script', $data);
            // costum js
            $this->load->view($viewsDashboardPath . 'system-management/js/js_submenu', $data);
            $this->load->view($backendTemplates . 'end', $data);
        } else {
            $data = [
                'submenu_id' => $this->input->post('submenu_id'),
                'submenu_name' => $this->input->post('name'),
                'submenu_method' => $this->input->post('method'),
                'submenu_icon' => $this->input->post('icon'),
                'submenu_menu_id' => $this->input->post('menu_id'),
                'submenu_active' => 1
            ];

            $this->M_public->insertData('user_submenu', $data);
            $this->session->set_flashdata('pesan-tambah-submenu', "Submenu baru berhasil di tambahkan! ");

            redirect('administrator/system-management/submenu');
        }
    }




    public function updateSubmenu()
    {
        $user = $this->M_user->getUser(['user_email' => $this->session->userdata('user_email')])->row_array();
        $submenu_id = $this->uri->segment(4);
        $submenu = $this->M_menu->getSubmenuWhere(['submenu_id' => $submenu_id]);
        $menu = $this->M_menu->getMenu();

        $data = [
            'title' => 'Update Submenu',
            'user' => $user,
            'submenu' => $submenu,
            'menu' => $menu
        ];


        $this->form_validation->set_rules(
            'name',
            'name',
            'required|trim',
            [
                'required' => 'Masukan nama submenu!'
            ]
        );
        $this->form_validation->set_rules(
            'method',
            'Method',
            'required|trim',
            [
                'required' => 'Masukan method submenunya!'
            ]
        );
        $this->form_validation->set_rules(
            'icon',
            'Icon',
            'required|trim',
            [
                'required' => 'Tentukan Icon!'
            ]
        );
        $this->form_validation->set_rules(
            'menu_id',
            'Menu',
            'required|trim',
            [
                'required' => 'Tentukan Menu!'
            ]
        );
        $backendTemplates = $this->publicData['backendTemplates'];
        $viewsDashboardPath = 'backend/dashboard/';
        if ($this->form_validation->run() == false) {
            $this->load->view($backendTemplates . 'header', $data);
            $this->load->view($backendTemplates . 'topbar', $data);
            $this->load->view($backendTemplates . 'sidebar', $data);
            $this->load->view($viewsDashboardPath . 'system-management/v_update-submenu', $data); //main content
            $this->load->view($backendTemplates . 'footer', $data);
            $this->load->view($viewsDashboardPath . '/plugins/_menu', $data); //plugins
            $this->load->view($backendTemplates . 'script', $data);
            // costum js
            $this->load->view($viewsDashboardPath . 'system-management/js/js_submenu', $data);
            $this->load->view($backendTemplates . 'end', $data);
        } else {
            $data = [
                'submenu_name' => $this->input->post('name'),
                'submenu_method' => $this->input->post('method'),
                'submenu_icon' => $this->input->post('icon'),
                'submenu_menu_id' => $this->input->post('menu_id'),
                'submenu_active' => 1
            ];

            $this->M_public->updateData(['submenu_id' => $submenu_id], 'user_submenu', $data);
            $this->session->set_flashdata('pesan-ubah-submenu', "Submenu berhasil diupdate! ");
            redirect('administrator/system-management/submenu');
        }
    }


    public function deleteSubmenu()
    {
        $submenu_id = $this->uri->segment(4);
        $submenu = $this->M_menu->getSubmenuWhere(['submenu_id' => $submenu_id]);
        $this->M_public->deleteData(['submenu_id' => $submenu_id], 'user_submenu');
        $this->session->set_flashdata(
            'pesan-hapus-submenu',
            'Berhasil menghapus submenu  <strong>' . $submenu['submenu_name'] . '</strong>!'
        );
        redirect('administrator/system-management/submenu');
    }


    // user access
    public function showUserAccessMenu()
    {
        $user = $this->M_user->getUser(['user_email' => $this->session->userdata('user_email')])->row_array();

        $data = [
            'title' => 'User level',
            'user' => $user,
            'user_level' => $this->M_public->getData('user_level')->result_array()
        ];



        if ($this->form_validation->run() == false) {
            $backendTemplates = $this->publicData['backendTemplates'];
            $viewsDashboardPath = 'backend/dashboard/';
            $this->load->view($backendTemplates . 'header', $data);
            $this->load->view($backendTemplates . 'topbar', $data);
            $this->load->view($backendTemplates . 'sidebar', $data);
            $this->load->view($viewsDashboardPath . 'system-management/v_user-access-menu', $data); //main content
            $this->load->view($backendTemplates . 'footer', $data);
            $this->load->view($viewsDashboardPath . '/plugins/_menu', $data); //plugins
            $this->load->view($backendTemplates . 'script', $data);
            // costum js
            $this->load->view($viewsDashboardPath . 'system-management/js/js_user-access-menu', $data);
            $this->load->view($backendTemplates . 'end', $data);
        }
    }

    public function getUserAccessMenu($level_id)
    {
        $user = $this->M_user->getUser(['user_email' => $this->session->userdata('user_email')])->row_array();

        $data = [
            'title' => 'User access menu',
            'user' => $user,

        ];

        $data['level'] = $this->db->get_where('user_level', ['level_id' => $level_id])->row_array();

        if ($data['level']['level_id']  <= '1') {
            $this->db->where('submenu_id !=', 1);
            $this->db->where('submenu_id !=', 3);
            $this->db->where('submenu_id !=', 4);
            $data['submenu'] = $this->db->get('user_submenu')->result_array();
            $this->db->where('menu_id !=', 2);
            $data['menu'] = $this->db->get('user_menu')->result_array();
        } else {
            $data['submenu'] = $this->db->get('user_submenu')->result_array();
            // $this->db->where('menu_id !=', 2);
            $data['menu'] = $this->db->get('user_menu')->result_array();
        }
        $backendTemplates = $this->publicData['backendTemplates'];
        $viewsDashboardPath = 'backend/dashboard/';
        $this->load->view($backendTemplates . 'header', $data);
        $this->load->view($backendTemplates . 'topbar', $data);
        $this->load->view($backendTemplates . 'sidebar', $data);
        $this->load->view($viewsDashboardPath . 'system-management/v_user-changeaccess-menu', $data); //main content
        $this->load->view($backendTemplates . 'footer', $data);
        $this->load->view($viewsDashboardPath . '/plugins/_menu', $data); //plugins
        $this->load->view($backendTemplates . 'script', $data);
        // costum js
        $this->load->view($viewsDashboardPath . 'system-management/js/js_user-changeaccess-menu', $data);
        $this->load->view($backendTemplates . 'end', $data);
    }


    public function changeAccess()
    {
        $menu_id = $this->input->post('menu_id');
        $level_id = $this->input->post('level_id');

        $data = [
            'access_user_level_id' => $level_id,
            'access_menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('pesan-akses', 'Berhasil mengubah aksesauth!');

        // echo json_encode($data);
    }

    public function changeSubmenuAccess()
    {
        $submenu_id = $this->input->post('submenu_id');
        $level_id = $this->input->post('level_id');

        $data = [
            'access_user_level_id' => $level_id,
            'access_submenu_id' => $submenu_id
        ];

        $result = $this->db->get_where('user_access_submenu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_submenu', $data);
        } else {
            $this->db->delete('user_access_submenu', $data);
        }

        $this->session->set_flashdata('pesan-akses', 'Berhasil mengubah akses !');

        echo json_encode($data);
    }


    public function addUserLevel()
    {
        $level = $this->input->post('level');
        $data = [
            'level' => $level
        ];
        if ($data) {

            $this->M_public->insertData('user_level', $data);

            $data = [
                'success' => true,
                'message' => 'Berhasil menambahkan level baru!'
            ];
        } else {
            $data = [
                'success' => false,
                'message' => 'Maaf.., Data yang diinput kosong!'
            ];
        }
        echo json_encode($data);
    }

    public function getUserLevel()
    {
        $level_id = $this->uri->segment(4);
        $data = $this->M_public->getDataWhere('user_level', ['level_id' => $level_id])->row_array();
        echo json_encode($data);
    }

    public function updateUserLevel()
    {
        $level_id = $this->input->post('level_id');
        $level = $this->input->post('level');
        $data_input = [
            'level_id' => $level_id,
            'level' => $level
        ];

        if ($data_input) {
            $this->M_public->updateData(['level_id' => $level_id], 'user_level', $data_input);
            $data = [
                'success' => true,
                'message' => 'Berhasil mengubah level!',
                'data' => $data_input
            ];
        } else {
            $data = [
                'success' => false,
                'message' => 'Maaf.., Data yang diinput kosong!'
            ];
        }
        echo json_encode($data);
    }


    public function DeleteUserLevel()
    {
        $level_id = $this->uri->segment(4);
        $user_level = $this->M_public->getDataWhere('user_level', ['level_id' => $level_id])->row_array();
        $this->M_public->deleteData(['level_id' => $level_id], 'user_level');
        $this->session->set_flashdata(
            'pesan-level',
            'Berhasil menghapus user level' . ' <strong> ' . $user_level['level'] . '</strong>!'
        );
        redirect('administrator/system-management/user-access-menu');
    }
}
