<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;

$router = new Router();

$router->get("/", "home@PageController");
$router->get("/about", "about@PageController");
$router->get("/contact", "contact@PageController");

$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);