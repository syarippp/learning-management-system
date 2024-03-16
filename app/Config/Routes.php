<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/', 'Home::daftar');
$routes->get('/', 'Login::index');
$routes->setAutoRoute(true);
