<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'C_auth::login');
$routes->post('auth/login', 'C_Auth::loginVerification');
$routes->get('auth/logout', 'C_Auth::logout');

//Sesion Admin Start
 $routes->group('admin', function($routes)
 {
    $routes->get('/', 'C_Admin::dashboard');
    $routes->get('transaksi', 'C_Admin::transaksi');
    $routes->get('data_barang', 'C_Admin::data_barang');
    $routes->get('laporan', 'C_Admin::laporan');
});
//Sesion Admin End

//Sesion User Start
$routes->group('user', function($routes)
{
    $routes->get('/', 'C_user::transaksi');
    $routes->get('data', 'C_user::data_barang');
});
//Sesion User End
