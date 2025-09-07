<?php

require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use App\Core\Router;

session_start();

$dotenv = Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

$router = new Router();

// --- Specify Routes Here ---
$router->get("/", "home@PageController");
$router->get("/about", "about@PageController");
$router->get("/contact", "contact@PageController");
$router->get("/dashboard", "dashboard@PageController");
$router->get("/login", "login@AuthController");
$router->get("/register", "register@AuthController");
$router->get("/account", "account@AuthController");
$router->post("/login", "loginPost@AuthController");
$router->post("/register", "registerPost@AuthController");

$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);