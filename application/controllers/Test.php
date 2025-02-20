<?php
if ( ! defined('BASEPATH')) exit("No direct script access allowed");

class Test extends CI_Controller {
    public function index() {
        $this->load->database(); // Load library database

        if ($this->db->conn_id) { // Cek apakah koneksi berhasil
            echo "Koneksi ke database berhasil!";
        } else {
            echo "Koneksi ke database gagal.";
        }
    }
}