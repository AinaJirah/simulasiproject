<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAsetTable extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_aset'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_aset'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
            ],
            'stok'       => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'foto'      => [
                'type'           => 'TEXT',
                'null'           => true,
            ],
            'id_jenis'       => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
        ]);
        $this->forge->addKey('id_aset', true);
        $this->forge->createTable('aset');
    }

    public function down()
    {
        //
        $this->forge->dropTable('aset');
    }
}
