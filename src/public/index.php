<?php
declare(strict_types=1);

session_start();

require '../vendor/autoload.php';
require "../controllers/HikesController.php";
require "../models/Hikes.php";

$url = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$method = $_SERVER['REQUEST_METHOD'];

var_dump($_SERVER['REQUEST_URI']);

if ($url === '/' || $url === '') {
    $hikesController = new HikesController();
    $hikesController->index();
}

if ($url === 'login') {
    $authController = new AuthController();

    if ($method === 'GET') {
        $authController->showLoginForm();
    }

    if ($method === 'POST') {
        $authController->login($_POST);
    }
}

if ($url === 'registration') {
    $authController = new AuthController();

    if ($method === 'GET') {
        $authController->showRegistrationForm();
    }

    if ($method === 'POST') {
        $authController->register($_POST);
    }
}

if ($url === 'hike') {
    $id = $_GET['id'];
    $hikesController = new HikesController();
    $hikesController->show($id);
}

if ($url === 'logout') {
    $authController  = new AuthController();
    $authController->logout();
}