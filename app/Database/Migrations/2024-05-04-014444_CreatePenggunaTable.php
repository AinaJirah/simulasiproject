<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePenggunaTable extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_pengguna'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '50',
            ],
            'no_hp'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '14',
            ],
            'alamat'      => [
                'type'           => 'TEXT',
            ],
            'username'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '15',
            ],
            'password'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'level'       => [
                'type'           => 'ENUM',
                'constraint'     => ['Admin', 'Masyarakat', 'Ka. Des'],
                'default'        => 'Masyarakat',
            ],
            'status_akun' => [
                'type'           => 'ENUM',
                'constraint'     => ['Aktif', 'Tidak Aktif'],
                'default'        => 'Aktif',
            ],
        ]);
        $this->forge->addKey('id_pengguna', true);
        $this->forge->createTable('pengguna');
    }

    public function down()
    {
        //
        $this->forge->dropTable('pengguna');
    }
}
