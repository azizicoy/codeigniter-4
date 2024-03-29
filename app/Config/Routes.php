<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->setAutoRoute(true);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'User\Auth::login');
$routes->get('/program', 'Program\Program::index', ['filter' => 'App\Filters\LoginFilter']);
$routes->post('/login/process', 'User\Auth::processLogin');
$routes->get('/register', 'User\Auth::register');
$routes->post('/register/validation', 'User\Auth::validation');
$routes->get('/logout', 'User\Auth::logout');

$routes->post('/auth/login', 'User\Auth::login');

$routes->get('/program', 'Program\Program::index'); // ROUTES KE HOME INDEX PROGRAM

$routes->get('/pemilik', 'Program\Pemilik::index'); // ROUTES KE CONTROLLER PEMILIK
$routes->get('/pemilik/pemilik_input', 'Program\Pemilik::input'); // ROUTES KE CONTROLLER PEMILIK
$routes->get('/pemilik/edit/(:segment)', 'Program\Pemilik::edit/$1'); // ROUTES KE CONTROLLER EDIT
$routes->delete('/program/pemilik/(:num)', 'Program\Pemilik::delete/$1'); // ROUTES KE CONTROLLER PEMILIK
$routes->get('/pemilik/(:any)', 'Program\Pemilik::detail/$1'); // ROUTES KE CONTROLLER PEMILIK

$routes->get('/pegawai', 'Program\Pegawai::index'); // ROUTES KE CONTROLLER PEGAWAI
$routes->get('/pegawai/edit/(:segment)', 'Program\Pegawai::edit/$1'); // ROUTES KE CONTROLLER EDIT
$routes->get('/pegawai/(:any)', 'Program\Pegawai::detail/$1'); // ROUTES KE CONTROLLER PEGAWAI DETAIL

$routes->get('/estimasi', 'Program\Estimasi::index'); // ROUTES KE CONTROLLER ESTIMASI
$routes->get('/estimasi/edit/(:segment)', 'Program\Estimasi::edit/$1'); // ROUTES KE CONTROLLER EDIT
$routes->get('/estimasi/print/(:any)', 'Program\Estimasi::print/$1'); // ROUTES KE CONTROLLER ESTIMASI PRINT
$routes->delete('/program/estimasi/(:num)', 'Program\Estimasi::delete/$1'); // ROUTES KE CONTROLLER DELETE
$routes->get('/estimasi/(:any)', 'Program\Estimasi::detail/$1'); // ROUTES KE CONTROLLER ESTIMASI

$routes->get('/mobil', 'Program\Mobil::index'); // ROUTES KE CONTROLLER MOBIL
$routes->get('/mobil/edit/(:segment)', 'Program\Mobil::edit/$1'); // ROUTES KE CONTROLLER EDIT
$routes->delete('program/mobil/(:num)', 'Program\Mobil::delete/$1'); // ROUTES KE CONTROLLER MOBIL
$routes->get('/mobil/(:any)', 'Program\Mobil::detail/$1'); // ROUTES KE CONTROLLER MOBIL

$routes->get('/part', 'Program\Part::index'); // ROUTES KE CONTROLLER PART
$routes->get('/part/part_input', 'Program\Part::input'); // ROUTES KE CONTROLLER PART INPUT
$routes->get('/part/edit/(:segment)', 'Program\Part::edit/$1'); // ROUTES KE CONTROLLER EDIT
$routes->delete('program/part/(:num)', 'Program\Part::delete/$1'); // ROUTES KE CONTROLLER MOBIL
$routes->get('/part/(:any)', 'Program\Part::detail/$1'); // ROUTES KE CONTROLLER PEMILIK

$routes->get('/penjadwalan', 'Program\Penjadwalan::index'); // ROUTES KE CONTROLLER PENJADWALAN
$routes->get('/penjadwalan/penjadwalan_input', 'Program\Penjadwalan::input'); // ROUTES KE CONTROLLER PENJADWALAN Input
$routes->post('/penjadwalan/update-status/(:num)', 'Program\Penjadwalan::updateStatus/$1');
$routes->get('/penjadwalan/edit/(:segment)', 'Program\Penjadwalan::edit/$1'); // ROUTES KE CONTROLLER EDIT
$routes->delete('/program/penjadwalan/(:num)', 'Program\Penjadwalan::delete/$1'); // ROUTES KE CONTROLLER PEMILIK
$routes->get('/penjadwalan/(:any)', 'Program\Penjadwalan::detail/$1'); // ROUTES KE CONTROLLER PENJADWALAN

$routes->get('/servis', 'Program\Servis::index'); // ROUTES KE CONTROLLER JENIS SERVIS
$routes->get('/servis/edit/(:segment)', 'Program\Servis::edit/$1'); // ROUTES KE CONTROLLER EDIT
$routes->delete('/program/servis/(:num)', 'Program\servis::delete/$1'); // ROUTES KE CONTROLLER SERVIS DELETE
$routes->get('/servis/(:any)', 'Program\Servis::detail/$1'); // ROUTES KE CONTROLLER JENIS SERVIS DETAIL



// $routes->get('/', 'Pemilik::index');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}