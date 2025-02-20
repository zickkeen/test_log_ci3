<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_users_table extends CI_Migration {
    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'username' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'unique' => TRUE // Username harus unik
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => TRUE // Email boleh kosong
            ),
            
            // 'created_at' => array(
            //     'type' => 'TIMESTAMP',
            //     'default' => CURRENT_TIMESTAMP
            // ),
            // 'updated_at' => array(
            //     'type' => 'TIMESTAMP',
            //     'null' => TRUE // Updated_at boleh kosong
            // ),
            'created_at' => array(
                'type' => 'DATETIME',
            ),
            'updated_at' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users');
    }

    public function down() {
        $this->dbforge->drop_table('users');
    }
}