<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::login');
$routes->get('/register', 'AuthController::register');
$routes->post('/auth/store', 'AuthController::store');
$routes->get('/login', 'AuthController::login');
$routes->post('/auth/authenticate', 'AuthController::authenticate');
$routes->get('/logout', 'AuthController::logout');
$routes->get('/dashboard', 'DashboardController::index');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/logout', 'Logout::index');

//untuk kos
$routes->get('/list_kost', 'KosController::list_kost');
$routes->get('/tambah_kost', 'KosController::index');
$routes->post('/tambah_kost', 'KosController::store');
$routes->get('/edit_kost/(:num)', 'KosController::edit/$1');
$routes->post('/edit_kost/(:num)', 'KosController::update/$1');
$routes->get('/delete_kost/(:num)', 'KosController::delete/$1');


//profile
// $routes->get('/dashboard/profile', 'DashboardController::profile');
// $routes->get('/profile/edit', 'DashboardController::editProfile');
// $routes->post('/profile/update', 'DashboardController::updateProfile');


// Rute untuk Dashboard

// Rute untuk Profil Pengguna
$routes->get('/profile', 'DashboardController::profile');
$routes->get('/edit_profile', 'DashboardController::editProfile');
$routes->post('/update_profile', 'DashboardController::updateProfile');

