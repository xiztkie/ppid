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
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/laporan', 'Home::laporan');
$routes->get('/tentang', 'Home::tentang');
$routes->get('/tugas', 'Home::tugas');
$routes->get('/struktur', 'Home::struktur');
$routes->get('/kontak', 'Home::kontak');
$routes->get('/regulasi', 'Home::regulasi');
$routes->get('/login', 'Auth::login');
$routes->get('/permohonan', 'Permohonan::index');
$routes->get('/cektiket', 'Cektiket::index');
$routes->get('/statistik', 'Statistik::index');
$routes->get('/dashboard', 'Admin::index');
$routes->get('/permohonandata', 'Permohonandata::index');
$routes->get('/permohonanbaru', 'Permohonandata::indexbaru');
$routes->get('/prosespermohonan', 'Permohonandata::indexproses');
$routes->get('/email', 'Emailsetting::index');
$routes->get('/kirimemail', 'Kirimemail::index');
$routes->get('/cekpermohonan', 'Cektiket::progresstiket');
$routes->post('kirimemail/send', 'Kirimemail::send');


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
