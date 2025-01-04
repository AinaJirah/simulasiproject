<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJenisAsetTable extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_jenis'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'jenis'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '20',
            ],
        ]);
        $this->forge->addKey('id_jenis', true);
        $this->forge->createTable('jenis_aset');
    }

    public function down()
    {
        //
        $this->forge->dropTable('jenis_aset');
    }
}
