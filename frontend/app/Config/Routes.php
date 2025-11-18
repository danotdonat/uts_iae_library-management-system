<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'LibraryController::index');
$routes->get('/create', 'LibraryController::create');
$routes->post('/store', 'LibraryController::store');
$routes->get('/delete/(:num)', 'LibraryController::delete/$1');

// app/Config/Routes.php

// Arahkan halaman utama ke LibraryController
$routes->get('/', 'LibraryController::index'); 

// Rute untuk Tambah Buku (Ini yang memperbaiki error 404 Anda)
$routes->get('book/create', 'LibraryController::create');
$routes->post('book/store', 'LibraryController::store');

// Rute untuk Edit dan Hapus
$routes->get('book/edit/(:num)', 'LibraryController::edit/$1');
$routes->get('book/delete/(:num)', 'LibraryController::delete/$1');

// Tambahkan baris ini untuk menangani proses simpan editnya
$routes->post('book/update/(:num)', 'LibraryController::update/$1');