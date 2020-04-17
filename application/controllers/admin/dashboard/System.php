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

    public function deleteMenu($id)
    {
        $menu = $this->M_menu->ShowMenuById(['menu_id' => $this->uri->segment(4)]);
        $this->M_public->deleteData(['menu_id' => $this->uri->segment(4)], 'user_menu');
        $this->session->set_flashdata(
            'pesan-hapus-menu',
            'Berhasil menghapus menu ' . $menu['menu_name'] . '!'
        );
        redirect('administrator/system-management/menu');
    }
}
