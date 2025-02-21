<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login'); 
        }
    }

    public function index() {
        $data['title'] = 'Login';
        $data['header'] = 'Selamat Datang di Halaman Login';
        $data['content'] = $this->load->view('dashboard_view', '', true);
        $this->load->view('layout', $data);
    }
}