<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_demo_user extends CI_Migration {
    public function up() {
        // Cek apakah tabel users sudah ada (untuk menghindari error jika migrasi ini dijalankan sebelum migrasi create_users_table)
        if ($this->db->table_exists('users')) {
            $demo_user = array(
                'username' => 'demo',
                'password' => password_hash('password', PASSWORD_DEFAULT), // Password "password" di-hash
                'email' => 'demo@example.com' // Ganti dengan email demo Anda
            );

            // Periksa apakah user demo sudah ada
            $existing_user = $this->db->get_where('users', array('username' => 'demo'))->row();

            if (!$existing_user) { // Jika user demo belum ada, maka insert
                $this->db->insert('users', $demo_user);
            }
        }
    }

    public function down() {
        // Hapus user demo jika diperlukan (opsional, tergantung kebutuhan)
        if ($this->db->table_exists('users')) {
            $this->db->delete('users', array('username' => 'demo'));
        }
    }
}