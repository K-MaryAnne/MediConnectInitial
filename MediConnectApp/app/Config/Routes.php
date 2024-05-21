<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('signup', 'SignUp::index');
$routes->get('signin', 'SignIn::index');
$routes->get('auth/register', 'Auth::register');
$routes->post('auth/register', 'Auth::register');
