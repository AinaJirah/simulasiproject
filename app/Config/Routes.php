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

$routes->get('/loginpendaftaran', 'Validasi::pendaftaran');
$routes->post('/loginpendaftaran', 'Validasi::loginpendaftaran');

//Registrasi
$routes->get('/register', 'Registrasi::index');
$routes->post('/register', 'Registrasi::registrasi');

//Registrasi
$routes->get('/pendaftaran', 'Pendaftaran::index');
$routes->post('/pendaftaran', 'Pendaftaran::pendaftaran');

// DASHBOARD
$routes->get('/admin', 'Dashboard::index');
$routes->get('/mahasiswa', 'Dashboard::index');


// KEPALA DESA (SUB MENU MANAGEMENT)
$routes->get('/mahasiswa/aset-barang', 'Aset::index');
$routes->get('/mahasiswa/peminjaman', 'Peminjaman::index');
$routes->get('/mahasiswa/menunggu-dikembalikan', 'Peminjaman::menunggu_dikembalikan');
$routes->get('/mahasiswa/peminjaman-selesai', 'Peminjaman::peminjaman_selesai');
$routes->post('/mahasiswa/peminjaman-selesai-cari', 'Peminjaman::peminjaman_selesai_cari');
$routes->get('/mahasiswa/print-peminjaman-selesai/(:any)/(:any)', 'Peminjaman::print_peminjaman_selesai/$1/$2');



