<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePeminjamanTable extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_peminjaman'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'qty'      => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'tgl_pinjam'       => [
                'type'           => 'DATE',
            ],
            'tgl_kembali'       => [
                'type'           => 'DATE',
                'NULL'           => true,
            ],
            'tgl_konfirmasi'       => [
                'type'           => 'DATE',
                'NULL'           => true,
            ],
            'status_pinjam'      => [
                'type'           => 'ENUM',
                'constraint'     => ['Menunggu', 'Ditolak', 'Dipinjam', 'Dikembalikan', 'Dibatalkan'],
                'default'        => 'Menunggu',
            ],
            'catatan'       => [
                'type'           => 'TEXT',
                'NULL'           => true,
            ],
            'alasan_tolak'       => [
                'type'           => 'TEXT',
                'NULL'           => true,
            ],
            'id_pengguna'       => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'id_aset'       => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
        ]);
        $this->forge->addKey('id_peminjaman', true);
        $this->forge->createTable('peminjaman');
    }

    public function down()
    {
        //
        $this->forge->dropTable('peminjaman');
    }
}
