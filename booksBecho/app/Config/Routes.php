<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/admin', 'BookController::admin');
$routes->get('admin/create', 'BookController::create');
$routes->post('/books/store', 'BookController::store');
$routes->get('admin/edit/(:num)', 'BookController::edit/$1');
$routes->post('books/update/(:num)', 'BookController::update/$1');
$routes->get('books/delete/(:num)', 'BookController::delete/$1');


$routes->get('/user/register', 'UserController::register');
$routes->post('/user/create', 'UserController::create');
$routes->get('/user/login', 'UserController::login');
$routes->post('/user/authenticate', 'UserController::authenticate');
$routes->get('/user/logout', 'UserController::logout');
$routes->get('/user/profile', 'UserController::updateProfile');  // Show profile form
$routes->post('/user/profile', 'UserController::updateProfile');  // Handle form submission

$routes->get('/', 'AddToCartController::showBooks'); // Display all books
$routes->get('/about', 'AddToCartController::aboutus');

$routes->get('/cart', 'AddToCartController::viewCart');
$routes->get('/cart/addToCart/(:num)', 'AddToCartController::addToCart/$1');
$routes->get('/cart/removeFromCart/(:num)', 'AddToCartController::removeFromCart/$1');
$routes->post('/cart/submitOrder', 'AddToCartController::submitOrder');
$routes->get('/cart/payment', 'AddToCartController::paymetView');