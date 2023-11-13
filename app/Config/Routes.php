<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/LogReg', 'MainController::LogReg');
$routes->post('/login', 'MainController::login');
$routes->post('/register', 'MainController::register');