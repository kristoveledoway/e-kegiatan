<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
// pegawai
$routes->get('/pegawai','C_Pegawai::index');
$routes->get('/pegawai/tambah_data','C_Pegawai::tambah_data');
$routes->add('/pegawai/tambah_data','C_Pegawai::tambah_data');
$routes->get('/pegawai/edit/(:num)','C_Pegawai::edit/$1');
$routes->add('/pegawai/edit/(:num)','C_Pegawai::edit/$1');
$routes->add('/pegawai/hapus/(:num)','C_Pegawai::hapus/$1');

// jabatan
$routes->get('/jabatan','C_Jabatan::index');
$routes->get('/jabatan/tambah_data','C_Jabatan::tambah_data');
$routes->add('/jabatan/tambah_data','C_Jabatan::tambah_data');
$routes->get('/jabatan/edit/(:num)','C_Jabatan::edit/$1');
$routes->add('/jabatan/edit/(:num)','C_Jabatan::edit/$1');
$routes->add('/jabatan/hapus/(:num)','C_Jabatan::hapus/$1');

// sub bagian
$routes->get('/sub_bagian','C_Sub_bagian::index');
$routes->get('/sub_bagian/tambah_data','C_Sub_bagian::tambah_data');
$routes->add('/sub_bagian/tambah_data','C_Sub_bagian::tambah_data');
$routes->get('/sub_bagian/edit/(:num)','C_Sub_bagian::edit/$1');
$routes->add('/sub_bagian/edit/(:num)','C_Sub_bagian::edit/$1');
$routes->add('/sub_bagian/hapus/(:num)','C_Sub_bagian::hapus/$1');

// master pegawai
$routes->get('/master_pegawai','C_Master_pegawai::index');
$routes->get('/master_pegawai/tambah_data','C_Master_pegawai::tambah_data');
$routes->add('/master_pegawai/tambah_data','C_Master_pegawai::tambah_data');
$routes->get('/master_pegawai/edit/(:num)','C_Master_pegawai::edit/$1');
$routes->add('/master_pegawai/edit/(:num)','C_Master_pegawai::edit/$1');
$routes->add('/master_pegawai/hapus/(:num)','C_Master_pegawai::hapus/$1');

// kinerja harian
$routes->get('/kinerja_harian','C_Kinerja_harian::index');
$routes->get('/kinerja_harian/tambah_data','C_Kinerja_harian::tambah_data');
$routes->add('/kinerja_harian/tambah_data','C_Kinerja_harian::tambah_data');
$routes->get('/kinerja_harian/edit/(:num)','C_Kinerja_harian::edit/$1');
$routes->add('/kinerja_harian/edit/(:num)','C_Kinerja_harian::edit/$1');
$routes->add('/kinerja_harian/hapus/(:num)','C_Kinerja_harian::hapus/$1');

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
