<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->setAutoRoute(false);

// Halaman utama
$routes->get('/', 'Home::index');

// Route untuk artikel publik
$routes->get('artikel', 'Artikel::index');
$routes->get('artikel/(:any)', 'Artikel::view/$1');

// Route untuk halaman statis
$routes->get('about', 'Page::about');
$routes->get('contact', 'Page::contact');
$routes->get('faqs', 'Page::faqs');
$routes->get('tos', 'Page::tos');

// Route group untuk admin
$routes->group('admin', ['filter' => 'auth'], function($routes) { 
    $routes->get('artikel', 'Artikel::admin_index'); 
    $routes->add('artikel/add', 'Artikel::add'); 
    $routes->add('artikel/edit/(:any)', 'Artikel::edit/$1'); 
    $routes->get('artikel/delete/(:any)', 'Artikel::delete/$1'); 
});

// Route untuk user (login)
$routes->get('/user', 'User::index');
$routes->match(['get','post'], '/user/login', 'User::login');