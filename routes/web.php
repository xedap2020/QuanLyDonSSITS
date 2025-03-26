<?php

// login
$router->get('login', 'AuthController@loginForm');
$router->post('login', 'AuthController@login');

// dashboard
// $router->get('', 'DashboardController@index'); 
$router->get('dashboard', 'DashboardController@index'); 

//logout
$router->get('logout', 'AuthController@logout');

// Users
$router->get('users', 'UserController@index');
$router->get('users/create', 'UserController@create');

// 
$router->get('requests', 'RequestController@index');
