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

$routes->get('/reset', 'Validasi::resetpassword');
$routes->post('/reset', 'Validasi::process');

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
$routes->get('/mahasiswa/matakuliah', 'MataKuliah::index');
$routes->get('/mahasiswa/jadwal', 'Jadwal::index');
$routes->get('/mahasiswa/nilai', 'Nilai::index');
$routes->get('/mahasiswa/nilai/cetak_transkrip', 'Nilai::cetak_transkrip');




