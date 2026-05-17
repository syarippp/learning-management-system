<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/', 'Home::daftar');
$routes->get('/', 'Login::index');
$routes->post('guru/buatkan_soal', 'Guru::buatkan_soal');
$routes->setAutoRoute(true);


