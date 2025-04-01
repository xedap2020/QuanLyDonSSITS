<?php

// ==============================
// 🔐 Auth Routes
// ==============================
$router->get('login',  'AuthController@loginForm');
$router->post('login', 'AuthController@login');
$router->get('logout', 'AuthController@logout');


// ==============================
// 📊 Dashboard
// ==============================
$router->get('dashboard', 'DashboardController@index');


// ==============================
// 👤 User Management
// ==============================
$router->get('users',                'UserController@index');
$router->get('users/create',         'UserController@create');
$router->get('users/edit/{id}',      'UserController@edit');
$router->post('users/confirm',       'UserController@confirm');
$router->post('users/store',         'UserController@store');
$router->get('users/check-username', 'UserController@checkUsername');
$router->post('users/delete',        'UserController@delete');
$router->post('users/delete-multiple', 'UserController@deleteMultiple');


// ==============================
// 📄 Request Management
// ==============================
$router->get('requests', 'RequestController@index');
