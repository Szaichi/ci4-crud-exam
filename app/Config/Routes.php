<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', function () {
    return redirect()->to('/login');
});

$routes->get('/register','Auth::register');
$routes->post('/register','Auth::store');

$routes->get('/login','Auth::login');
$routes->post('/login','Auth::authenticate');

$routes->get('/logout','Auth::logout');

$routes->get('/dashboard','Dashboard::index');

$routes->get('/records','Records::index');
$routes->get('/records/create','Records::create');
$routes->post('/records/store','Records::store');

$routes->get('/records/(:num)','Records::show/$1');

$routes->get('/records/edit/(:num)','Records::edit/$1');
$routes->post('/records/update/(:num)','Records::update/$1');

$routes->get('/records/delete/(:num)','Records::delete/$1');

$routes->get('/profile','ProfileController::show');

$routes->get('/profile/edit','ProfileController::edit');

$routes->post('/profile/update','ProfileController::update');