<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../core/View.php';

// Load controller & model
foreach (glob(__DIR__ . '/../controllers/*.php') as $file) require_once $file;
foreach (glob(__DIR__ . '/../models/*.php') as $file) require_once $file;

// Route setup
$router = new Router();
require_once __DIR__ . '/../routes/web.php';

// Xử lý route
$router->direct($_GET['url'] ?? '');
