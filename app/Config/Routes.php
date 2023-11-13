<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/LogReg', 'MainController::LogReg');
$routes->post('/login', 'LogRegController::login');
$routes->post('/register', 'LogRegController::register');

$routes->get('/getUserAccounts', 'LogRegController::getUserAccounts');