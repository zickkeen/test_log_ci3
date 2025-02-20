<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_user_by_username($username) {
        return $this->db->get_where('users', array('username' => $username))->row();
    }

    public function insert_user($data) {
        return $this->db->insert('users', $data);
    }
}