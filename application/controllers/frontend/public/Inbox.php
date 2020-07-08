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



        if ($inbox == []) {
            $row = false;
        } else {
            foreach ($inbox as $i => $val) {

                $row[$i] = $val;

                $row[$i]['date_format_sort'] = date("d F y ", $val['inbox_created_at']);
                $row[$i]['date_format_long'] = date("l, d F Y", $val['inbox_created_at']);
                $row;
            }
        }


        $data['user'] = $this->M_user->getAllAdmin();

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
    public function detail()
    {

        if ($this->session->userdata('primerental_user') != NULL) {
            $user = $this->M_user->getUser(['user_email' => $this->session->userdata('primerental_user')['user_email']]);
            if ($user->num_rows() > 0) {
                $user = $user->row_array();

                $inbox_id = $this->uri->segment(5);
                $inbox = $this->M_inbox->getInbox(['inbox_id' => $inbox_id])->row_array();

                if ($inbox['inbox_status'] == 0) {
                    $this->M_public->updateData(['inbox_id' => $inbox_id], 'inbox', ['inbox_status' => 1]);
                }

                $data['inbox'] = $inbox;
                $data['sender'] = $this->M_user->getAdmin(['user_email' => $inbox['inbox_from']])->row_array();

                $data['user'] = $user;
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
        $this->load->view($views .  "inbox/inbox-detail", $data);
        $this->load->view($templatesPath .  "end", $data);
    }

    public function addInbox()
    {


        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');

        $post_data = json_decode(file_get_contents('php://input'), true);

        foreach ($post_data as $key => $val) {
            // $val = filter_var($val, FILTER_SANITIZE_STRING); // Remove all HTML tags from string
            $post_data[$key] = $val;
            $post_data['inbox_id'] = getAutoNumber('inbox', 'inbox_id', 'inbox00', 10);
            $post_data['inbox_created_at'] = time();
            $post_data['inbox_status'] = 0;
        }

        $inbox = [
            'inbox_id' => $post_data['inbox_id'],
            'inbox_to' => $post_data['inbox_to'],
            'inbox_from' => $post_data['inbox_from'],
            'inbox_subject' => $post_data['inbox_subject'],
            'inbox_title' => $post_data['inbox_title'],
            'inbox_text' => $post_data['inbox_text'],
            'inbox_status' => $post_data['inbox_status'],
            'inbox_created_at' => $post_data['inbox_created_at'],
        ];

        $result = $this->M_public->insertData('inbox', $inbox);
        // $result = 1;
        if ($result >= 0) {
            $data['status'] = true;
            $data['inbox'] = $inbox;
        }



        echo json_encode($data);
    }
}
