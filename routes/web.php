<?php

// Login / Logout
$router->get('login', 'AuthController@loginForm');
$router->post('login', 'AuthController@login');
$router->get('logout', 'AuthController@logout');

// Dashboard
$router->get('dashboard', 'DashboardController@index');

// Users
$router->get('users', 'UserController@index');
$router->get('users/create', 'UserController@create');
$router->get('users/edit/{id}', 'UserController@edit');

// Requests
$router->get('requests', 'RequestController@index');


