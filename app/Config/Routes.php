<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// arti dari routes ini jadi kalo ada akses dengan method get(ketik dari url), maka akan diarahkan ke root(/) atau base urlnya dengan controller home dan method index
// $routes->get('/', 'Pages::index');
// kita juga bisa nambahin konfigurasi routes ini. jadi kan kalo buka controller coba method defaultnya itu index, bisa kita paksa method about yang jadi default.
// $routes->get('/coba', 'Coba::about');

// ini pake closures. jadi ga manggil method dan controller. tapi manggil function
// $routes->get('/closures', function () {
// 	echo 'ini adalah function di closures';
// });

// $routes->get('/coba/index', 'Coba::index');
// $routes->get('/coba/about', 'Coba::about');

// // disini kita mau panggil controller coba method about tapi nama methodnya ga di tulis. jadi di urlnya tinggal ketik controller terus paramnya. /$1 itu buat nangkep data dari urlnya. paramnya ada any(karakter apapun), num(nomer), segment (apapun kecuali slash /), alpha (alfabet a-z),dll
// $routes->get('/coba/(:any)/(:num)', 'Coba::about/$1/$2');

// ================================ Yang Dipake ========================================
$routes->get('/', 'Pages::index');
$routes->get('/comics/edit/(:segment)', 'Comics::edit/$1');
$routes->get('/comics/create', 'Comics::create');
$routes->delete('/comics/(:num)', 'Comics::delete/$1');

$routes->get('/comics/(:any)', 'Comics::detail/$1');


// // ================================ Admin ========================================
// $routes->get('/users', 'Admin\Users::index');

/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
