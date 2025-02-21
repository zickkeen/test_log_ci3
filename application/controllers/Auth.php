<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function login() {
        $data['title'] = 'Login';
        $data['header'] = 'Selamat Datang di Halaman Login';
        // $data['css'] = array('login.css'); // Jika ada file CSS khusus untuk login
        // $data['js'] = array('login.js'); // Jika ada file JS khusus untuk login
        
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // $this->load->view('auth/login_form'); // Tampilkan form login
            $data['content'] = $this->load->view('auth/login_form', '', true);
            $this->load->view('layout', $data);
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->User_model->get_user_by_username($username);

            if ($user && password_verify($password, $user->password)) {
                // Login berhasil
                $this->session->set_userdata('user_id', $user->id);
                redirect('dashboard');
            } else {
                // Login gagal
                $this->session->set_flashdata('error', 'Username atau password salah.');
                redirect('auth/login');
            }
        }
    }

    public function register() {
        $data['title'] = 'Register';
        $data['header'] = 'Selamat Datang di Halaman Register';

        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

        if ($this->form_validation->run() == FALSE) {
            // $this->load->view('auth/register_form');
            $data['content'] = $this->load->view('auth/register_form', '', true);
            $this->load->view('layout', $data);
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            );

            if ($this->User_model->insert_user($data)) {
                // Registrasi berhasil
                redirect('auth/login');
            } else {
                // Registrasi gagal
                $this->session->set_flashdata('error', 'Terjadi kesalahan saat registrasi.');
                redirect('auth/register');
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}