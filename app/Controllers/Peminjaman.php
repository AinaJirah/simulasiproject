<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAset;
use App\Models\ModelPeminjaman;

class Peminjaman extends BaseController
{
    protected $modelAset;
    protected $modelPeminjaman;

    public function __construct()
    {
        $this->modelAset = new ModelAset();
        $this->modelPeminjaman = new ModelPeminjaman();
    }

    public function index()
    {
        $level = session()->get('level');
        $data = [];

        if ($level === 'Admin' || $level === 'Ka. Des') {
            $data = [
                'title' => 'Peminjaman (Menunggu Konfirmasi)',
                'peminjaman' => $this->modelPeminjaman
                    ->join('pengguna', 'pengguna.id_pengguna = peminjaman.id_pengguna')
                    ->join('aset', 'aset.id_aset = peminjaman.id_aset')
                    ->where('status_pinjam', 'Menunggu')
                    ->findAll(),
            ];
        } elseif ($level === 'Masyarakat') {
            $data = [
                'title' => 'Peminjaman (Menunggu Konfirmasi)',
                'peminjaman' => $this->modelPeminjaman
                    ->join('aset', 'aset.id_aset = peminjaman.id_aset')
                    ->join('jenis_aset', 'jenis_aset.id_jenis = aset.id_jenis')
                    ->where('id_pengguna', session()->get('id_pengguna'))
                    ->where('status_pinjam', 'Menunggu')
                    ->findAll(),
            ];
        } else {
            return redirect()->to('/unauthorized');
        }

        echo view('components/header', $data);

        if ($level === 'Admin') {
            echo view('components/sidebar_admin', $data);
            echo view('admin/management/menunggu_konfirmasi', $data);
        } elseif ($level === 'Ka. Des') {
            echo view('components/sidebar_kades', $data);
            echo view('kades/management/menunggu_konfirmasi', $data);
        } elseif ($level === 'Masyarakat') {
            echo view('components/sidebar_peminjam', $data);
            echo view('peminjam/management/menunggu_konfirmasi', $data);
        }

        echo view('components/footer');
    }

    public function tambah()
    {
        $level = session()->get('level');
        if ($level !== 'Masyarakat') {
            return redirect()->to('/unauthorized');
        }

        $id_aset = $this->request->getPost('id_aset');
        $tgl_pinjam = $this->request->getPost('tgl_pinjam');
        $tgl_kembali = $this->request->getPost('tgl_kembali');
        $catatan = $this->request->getPost('catatan');
        $id_pengguna = session()->get('id_pengguna');
        $qty = $this->request->getPost('qty');
        $stok = $this->request->getPost('stok');

        if ($qty > $stok) {
            session()->setFlashdata('pesan', '<div class="alert alert-danger" role="alert">Qty tidak boleh melebihi stok</div>');
            return redirect()->to('/peminjam/aset-barang');
        }

        $data = [
            'qty' => $qty,
            'tgl_pinjam' => $tgl_pinjam,
            'tgl_kembali' => $tgl_kembali,
            'status_pinjam' => 'Menunggu',
            'catatan' => $catatan,
            'id_pengguna' => $id_pengguna,
            'id_aset' => $id_aset,
        ];

        $this->modelPeminjaman->insert($data);

        // mengurang stok aset
        $dataAset = ['stok' => $stok - $qty];
        $this->modelAset->update($id_aset, $dataAset);

        session()->setFlashdata('pesan', '<div class="alert alert-success" role="alert">Peminjaman berhasil</div>');
        return redirect()->to('/peminjam/aset-barang');
    }

    public function batal()
    {
        $level = session()->get('level');
        if ($level !== 'Masyarakat') {
            return redirect()->to('/unauthorized');
        }

        $id_peminjaman = $this->request->getPost('id_peminjaman');
        $id_aset = $this->request->getPost('id_aset');
        $qty = $this->request->getPost('qty');
        $stok = $this->request->getPost('stok');

        $alasan_tolak = $this->request->getPost('alasan_tolak') ?: 'Tidak ada alasan';

        $data = [
            'status_pinjam' => 'Dibatalkan',
            'alasan_tolak' => $alasan_tolak,
        ];
        $this->modelPeminjaman->update($id_peminjaman, $data);

        // menambah stok aset
        $dataAset = ['stok' => $stok + $qty];
        $this->modelAset->update($id_aset, $dataAset);

        session()->setFlashdata('pesan', '<div class="alert alert-success" role="alert">Peminjaman dibatalkan</div>');
        return redirect()->to('/peminjam/peminjaman');
    }

    public function terima($id_peminjaman)
    {
        $level = session()->get('level');
        if ($level !== 'Admin') {
            return redirect()->to('/unauthorized');
        }

        $data = ['status_pinjam' => 'Dipinjam'];
        $this->modelPeminjaman->update($id_peminjaman, $data);
        session()->setFlashdata('pesan', '<div class="alert alert-success" role="alert">Peminjaman berhasil diterima</div>');
        return redirect()->to('/admin/peminjaman');
    }

    public function tolak()
    {
        $level = session()->get('level');
        if ($level !== 'Admin') {
            return redirect()->to('/unauthorized');
        }

        $id_peminjaman = $this->request->getPost('id_peminjaman');
        $peminjaman = $this->modelPeminjaman->find($id_peminjaman);
        $id_aset = $peminjaman['id_aset'];
        $qty = $peminjaman['qty'];
        $aset = $this->modelAset->find($id_aset);
        $stok = $aset['stok'];

        $dataAset = ['stok' => $stok + $qty];
        $this->modelAset->update($id_aset, $dataAset);

        $data = [
            'status_pinjam' => 'Ditolak',
            'alasan_tolak' => $this->request->getPost('alasan_tolak'),
        ];
        $this->modelPeminjaman->update($id_peminjaman, $data);
        session()->setFlashdata('pesan', '<div class="alert alert-success" role="alert">Peminjaman berhasil ditolak</div>');
        return redirect()->to('/admin/peminjaman');
    }

    public function menunggu_dikembalikan()
    {
        $level = session()->get('level');
        $data = [
            'title' => 'Peminjaman (Menunggu Dikembalikan)',
            'peminjaman' => $this->modelPeminjaman
                ->join('pengguna', 'pengguna.id_pengguna = peminjaman.id_pengguna')
                ->join('aset', 'aset.id_aset = peminjaman.id_aset')
                ->where('status_pinjam', 'Dipinjam')
                ->findAll(),
        ];

        echo view('components/header', $data);

        if ($level === 'Admin') {
            echo view('components/sidebar_admin', $data);
            echo view('admin/management/menunggu_dikembalikan', $data);
        } elseif ($level === 'Ka. Des') {
            echo view('components/sidebar_kades', $data);
            echo view('kades/management/menunggu_dikembalikan', $data);
        } elseif ($level === 'Masyarakat') {
            $data['peminjaman'] = $this->modelPeminjaman
                ->join('aset', 'aset.id_aset = peminjaman.id_aset')
                ->join('jenis_aset', 'jenis_aset.id_jenis = aset.id_jenis')
                ->where('id_pengguna', session()->get('id_pengguna'))
                ->where('status_pinjam', 'Dipinjam')
                ->findAll();
            echo view('components/sidebar_peminjam', $data);
            echo view('peminjam/management/menunggu_dikembalikan', $data);
        }

        echo view('components/footer');
    }

    public function barang_kembali($id_peminjaman)
    {
        $level = session()->get('level');
        if ($level !== 'Admin') {
            return redirect()->to('/unauthorized');
        }

        $peminjaman = $this->modelPeminjaman->find($id_peminjaman);
        $id_aset = $peminjaman['id_aset'];
        $qty = $peminjaman['qty'];
        $aset = $this->modelAset->find($id_aset);
        $stok = $aset['stok'];

        $dataAset = ['stok' => $stok + $qty];
        $this->modelAset->update($id_aset, $dataAset);

        $data = [
            'status_pinjam' => 'Dikembalikan',
            'tgl_konfirmasi' => date('Y-m-d'),
        ];
        $this->modelPeminjaman->update($id_peminjaman, $data);
        session()->setFlashdata('pesan', '<div class="alert alert-success" role="alert">Barang telah dikembalikan</div>');
        return redirect()->to('/admin/menunggu-dikembalikan');
    }

    public function peminjaman_selesai()
    {
        $level = session()->get('level');
        $data = [
            'title' => 'Peminjaman (Peminjaman Selesai)',
            'peminjaman' => $this->modelPeminjaman
                ->join('pengguna', 'pengguna.id_pengguna = peminjaman.id_pengguna')
                ->join('aset', 'aset.id_aset = peminjaman.id_aset')
                ->groupStart()
                ->where('status_pinjam', 'Ditolak')
                ->orWhere('status_pinjam', 'Dikembalikan')
                ->orWhere('status_pinjam', 'Dibatalkan')
                ->groupEnd()
                ->findAll(),
            'tgl_awal' => '1',
            'tgl_akhir' => '1',
        ];

        echo view('components/header', $data);

        if ($level === 'Admin') {
            echo view('components/sidebar_admin', $data);
            echo view('admin/management/peminjaman_selesai', $data);
        } elseif ($level === 'Ka. Des') {
            echo view('components/sidebar_kades', $data);
            echo view('kades/management/peminjaman_selesai', $data);
        } elseif ($level === 'Masyarakat') {
            $data['peminjaman'] = $this->modelPeminjaman
                ->join('aset', 'aset.id_aset = peminjaman.id_aset')
                ->join('jenis_aset', 'jenis_aset.id_jenis = aset.id_jenis')
                ->where('id_pengguna', session()->get('id_pengguna'))
                ->groupStart()
                ->where('status_pinjam', 'Ditolak')
                ->orWhere('status_pinjam', 'Dikembalikan')
                ->orWhere('status_pinjam', 'Dibatalkan')
                ->groupEnd()
                ->findAll();
            echo view('components/sidebar_peminjam', $data);
            echo view('peminjam/management/peminjaman_selesai', $data);
        }

        echo view('components/footer');
    }

    public function peminjaman_selesai_cari()
    {
        $level = session()->get('level');
        if ($level !== 'Admin' && $level !== 'Ka. Des') {
            return redirect()->to('/unauthorized');
        }

        $tgl_awal = $this->request->getPost('tgl_awal');
        $tgl_akhir = $this->request->getPost('tgl_akhir');

        
        $data = [
            'title' => 'Peminjaman (Peminjaman Selesai)',
            'peminjaman' => $this->modelPeminjaman
                ->join('pengguna', 'pengguna.id_pengguna = peminjaman.id_pengguna')
                ->join('aset', 'aset.id_aset = peminjaman.id_aset')
                ->where('peminjaman.tgl_pinjam >=', $tgl_awal)
                ->where('peminjaman.tgl_pinjam <=', $tgl_akhir)
                ->groupStart()
                ->where('status_pinjam', 'Ditolak')
                ->orWhere('status_pinjam', 'Dikembalikan')
                ->orWhere('status_pinjam', 'Dibatalkan')
                ->groupEnd()
                ->findAll(),
            'tgl_awal' => $tgl_awal,
            'tgl_akhir' => $tgl_akhir,
        ];

        echo view('components/header', $data);

        if ($level === 'Admin') {
            echo view('components/sidebar_admin', $data);
            echo view('admin/management/peminjaman_selesai', $data);
        } elseif ($level === 'Ka. Des') {
            echo view('components/sidebar_kades', $data);
            echo view('kades/management/peminjaman_selesai', $data);
        }

        echo view('components/footer');
    }

    public function print_peminjaman_selesai($tgl_awal, $tgl_akhir)
    {
        $level = session()->get('level');
        if ($level !== 'Admin' && $level !== 'Ka. Des') {
            return redirect()->to('/unauthorized');
        }

        $data = [
            'title' => 'Print Peminjaman Selesai',
            'tgl_awal' => $tgl_awal,
            'tgl_akhir' => $tgl_akhir,
        ];

        if ($tgl_awal == '1') {
            $data['peminjaman'] = $this->modelPeminjaman
                ->join('pengguna', 'pengguna.id_pengguna = peminjaman.id_pengguna')
                ->join('aset', 'aset.id_aset = peminjaman.id_aset')
                ->groupStart()
                ->where('status_pinjam', 'Ditolak')
                ->orWhere('status_pinjam', 'Dikembalikan')
                ->orWhere('status_pinjam', 'Dibatalkan')
                ->groupEnd()
                ->findAll();
        } else {
            $data['peminjaman'] = $this->modelPeminjaman
                ->join('pengguna', 'pengguna.id_pengguna = peminjaman.id_pengguna')
                ->join('aset', 'aset.id_aset = peminjaman.id_aset')
                ->where('peminjaman.tgl_pinjam >=', $tgl_awal)
                ->where('peminjaman.tgl_pinjam <=', $tgl_akhir)
                ->groupStart()
                ->where('status_pinjam', 'Ditolak')
                ->orWhere('status_pinjam', 'Dikembalikan')
                ->orWhere('status_pinjam', 'Dibatalkan')
                ->groupEnd()
                ->findAll();
        }

        if ($level === 'Admin') {
            echo view('admin/print/peminjaman_selesai', $data);
        } elseif ($level === 'Ka. Des') {
            echo view('kades/print/peminjaman_selesai', $data);
        }
    }
}
