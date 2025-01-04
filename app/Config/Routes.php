<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//Landing Page
$routes->get('/', 'LandingPage::index');

// AUTH
$routes->get('/login', 'Validasi::index');
$routes->post('/login', 'Validasi::login');
$routes->get('/logout', 'Validasi::logout');
$routes->post('/profil', 'Validasi::profil');

//Registrasi
$routes->get('/register', 'Registrasi::index');
$routes->post('/register', 'Registrasi::registrasi');

// DASHBOARD
$routes->get('/admin', 'Dashboard::index');
$routes->get('/kades', 'Dashboard::index');
$routes->get('/peminjam', 'Dashboard::index');

// ADMIN (SUB MENU MASTER DATA)
// -------ASET----------//
$routes->get('/admin/master-aset', 'Aset::index');
$routes->post('/admin/tambah-aset', 'Aset::tambah');
$routes->post('/admin/edit-aset', 'Aset::edit');
$routes->post('/admin/hapus-aset', 'Aset::hapus');
//---------JENIS ASET----------//
$routes->get('/admin/master-kategori', 'JenisAset::index');
$routes->post('/admin/tambah-kategori', 'JenisAset::tambah');
$routes->post('/admin/edit-kategori', 'JenisAset::edit');
$routes->post('/admin/hapus-kategori', 'JenisAset::hapus');
//---------Akun----------//
$routes->get('/admin/master-akun', 'Pengguna::index');
$routes->post('/admin/edit-akun', 'Pengguna::edit_akun');
//---------Pengguna----------//
$routes->get('/admin/master-pengguna', 'Pengguna::pengguna');
$routes->post('/admin/tambah-pengguna', 'Pengguna::tambah_pengguna');
$routes->post('/admin/edit-pengguna', 'Pengguna::edit_pengguna');
$routes->post('/admin/hapus-pengguna', 'Pengguna::hapus_pengguna');

// ADMIN (SUB MENU MANAGEMENT)
$routes->get('/admin/aset-barang', 'Aset::aset_barang');
$routes->get('/admin/peminjaman', 'Peminjaman::index');
$routes->get('/admin/terima/(:num)', 'Peminjaman::terima/$1');
$routes->post('/admin/tolak', 'Peminjaman::tolak');
$routes->get('/admin/menunggu-dikembalikan', 'Peminjaman::menunggu_dikembalikan');
$routes->get('/admin/barang_kembali/(:num)', 'Peminjaman::barang_kembali/$1');
$routes->get('/admin/peminjaman-selesai', 'Peminjaman::peminjaman_selesai');
$routes->post('/admin/peminjaman-selesai-cari', 'Peminjaman::peminjaman_selesai_cari');
$routes->get('/admin/print-peminjaman-selesai/(:any)/(:any)', 'Peminjaman::print_peminjaman_selesai/$1/$2');

// KEPALA DESA (SUB MENU MANAGEMENT)
$routes->get('/kades/aset-barang', 'Aset::index');
$routes->get('/kades/peminjaman', 'Peminjaman::index');
$routes->get('/kades/menunggu-dikembalikan', 'Peminjaman::menunggu_dikembalikan');
$routes->get('/kades/peminjaman-selesai', 'Peminjaman::peminjaman_selesai');
$routes->post('/kades/peminjaman-selesai-cari', 'Peminjaman::peminjaman_selesai_cari');
$routes->get('/kades/print-peminjaman-selesai/(:any)/(:any)', 'Peminjaman::print_peminjaman_selesai/$1/$2');

// MASYARAKAT/PEMINJAMAN (SUB MENU MANAGEMENT)
$routes->get('/peminjam/aset-barang', 'Aset::index');
$routes->get('/peminjam/peminjaman', 'Peminjaman::index');
$routes->post('/peminjam/pinjam', 'Peminjaman::tambah');
$routes->post('/peminjam/batal', 'Peminjaman::batal');
$routes->get('/peminjam/menunggu-dikembalikan', 'Peminjaman::menunggu_dikembalikan');
$routes->get('/peminjam/peminjaman-selesai', 'Peminjaman::peminjaman_selesai');


