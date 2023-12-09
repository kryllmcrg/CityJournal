<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/LogReg', 'MainController::LogReg');
$routes->post('/login', 'LogRegController::login');
$routes->post('/register', 'LogRegController::register');
$routes->post('/add', 'NewsController::add');
$routes->get('/getUserAccounts', 'LogRegController::getUserAccounts');

$routes->get('/getAdd', 'NewsController::getAdd');
$routes->get('/displayNews', 'NewsController::displayNews');
$routes->post('/changeNewsStatus', 'NewsController::changeNewsStatus');
$routes->post('/changeNewsStatus', 'NewsController::changeNewsStatus');
$routes->post('/updateNews', 'NewsController::updateNews');
$routes->post('/deleteNews', 'NewsController::deleteNews');

$routes->post('/comment', 'NewsController::comment');