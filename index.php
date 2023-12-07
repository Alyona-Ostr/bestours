<?php

use Laminas\Diactoros\Response\RedirectResponse;
use MiladRahimi\PhpRouter\Router;

use Src\Controllers\ProfileController;
use Src\Middleware\AuthMiddleware;

require_once "vendor/autoload.php";

session_start();

ORM::configure('mysql:host=database;dbname=docker');
ORM::configure('username', 'root');
ORM::configure('password', 'tiger');

$router = Router::create();
$router->setupView("views");

$router->get("/", [\Src\Controllers\MainController::class, "indexPage"]);
$router->get("/about", [\Src\Controllers\MainController::class, "aboutPage"]);
$router->get("/faq", [\Src\Controllers\MainController::class, "faqPage"]);
$router->get("/blog", [\Src\Controllers\MainController::class, "blog"]);
$router->get("/blogpost", [\Src\Controllers\MainController::class, "blog_post"]);


$router->get("/contact", [\Src\Controllers\MainController::class, "contact"]);
$router->post("/contact", [\Src\Controllers\AuthController::class, "contact"]);

$router->get("/grid", [\Src\Controllers\MainController::class, "grid"]);
$router->get("/list", [\Src\Controllers\MainController::class, "list"]);

$router->get("/detail/{id}", [\Src\Controllers\MainController::class, "detail"]);
$router->post("/addreview", [\Src\Controllers\AuthController::class, "addreview"]);
$router->post("/booking", [\Src\Controllers\AuthController::class, "booking"]);


$router->dispatch();