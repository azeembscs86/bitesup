<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->lang->load('auth');
    }

    function index() {
        $data['folder_name'] = 'main';
        $data['header_name'] = 'header';
        $data['nav_name'] = 'nav_main';
        $data['file_name'] = 'login';
        $this->load->view('index', $data);
    }

    public function check_user() {
        $this->ion_auth->login($this->input->post('email'), $this->input->post('password'));
        $errors_array = $this->ion_auth->errors_array();
        $messages_array = $this->ion_auth->messages_array();
        if (!empty($errors_array[0])) {
            $this->session->set_flashdata('error', $errors_array[0]);
            redirect('login');
        } elseif (!empty($messages_array[0])) {
            
            redirect('dashboard');
            //($user_type == 'e' ? redirect('employee') : redirect('recruiter'));
        }
    }

    public function logout() {

        $this->ion_auth->logout();
        redirect('login');
    }

}

?>
