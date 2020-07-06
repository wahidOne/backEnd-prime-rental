<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inbox extends CI_Controller
{
    public $public = [
        "templates" => "frontEnd/templates/user/",
        "pages" => "frontEnd/pages/user/"

    ];


    public function loadInbox()
    {

        $user_id = $this->input->get('user_id');

        $inbox = $this->M_inbox->getInbox(['inbox_to' => $user_id])->result_array();

        // foreach ($inbox as $i) {
        //     $from = $this->M_user->getUser(['user_email' => $i['inbox_from']])->result_array();
        // }

        foreach ($inbox as $i => $val) {

            $row[$i] = $val;

            $row[$i]['date_format_sort'] = date("d F y ", $val['inbox_created_at']);
            $row[$i]['date_format_long'] = date("l, d F Y", $val['inbox_created_at']);
            $row;
        }

        $data['user'] = $this->M_user->getAllUser();

        $data['inbox'] = $row;
        // $data['from'] = $from;


        echo json_encode($data);
    }

    public function viewInbox()
    {

        if ($this->session->userdata('primerental_user') != NULL) {
            $user = $this->M_user->getUser(['user_email' => $this->session->userdata('primerental_user')['user_email']]);
            if ($user->num_rows() > 0) {
                $user = $user->row_array();
                $data['user'] = $user;
                $data['allbank'] = $this->M_public->getData('bank')->result_array();
            } else {
                $data['user'] = [];
            }
        } else {
            $this->session->set_flashdata('auth-info', 'Silahkan login terlebih dahulu! untuk mengakses halamannya');
            redirect('autentifikasi/login');
        }



        $data['title'] = "Inbox";
        $templatesPath  = $this->public['templates'];
        $views  = $this->public['pages'];
        $data['componentPath'] = $views . "components/";
        $this->load->view($templatesPath .  "header", $data);
        $this->load->view($templatesPath .  "sidebar", $data);
        $this->load->view($templatesPath .  "topbar", $data);
        $this->load->view($views .  "inbox/inbox", $data);
        $this->load->view($templatesPath .  "end", $data);
    }
}
