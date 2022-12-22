<?php
declare(strict_types=1);

session_start();

require '../vendor/autoload.php';
require "../controllers/HikesController.php";
require "../models/Hikes.php";

$url = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$method = $_SERVER['REQUEST_METHOD'];

var_dump($_SERVER['REQUEST_URI']);
var_dump($_SESSION);


if ($url === '/' || $url === '') {
    $hikesController = new HikesController();
    $hikesController->index();
}

if ($url === 'hikesList') {
    $hikesController = new HikesController();
    if ($method === 'GET') {
        $hikesController->indexAdmin();
    }

    if ($method === 'POST') {
        $hikesController->deleteHike($_POST);
    }
}

if ($url === 'userList') {
    $authController = new AuthController();
    if ($method === 'GET') {
        $authController->indexAdmin();
    }

    if ($method === 'POST') {
        $authController->deleteUser($_POST);
    }
}

if ($url === 'tagsList') {
    $tagsController = new TagsController();
    if ($method === 'GET') {
        $tagsController->indexAdmin();
    }

    if ($method === 'POST') {
        $tagsController->deleteTag($_POST);
    }
}

if ($url === 'addTag') {
    $tagsController = new TagsController();
    if ($method === 'GET') {
        $tagsController->showAddForm();
    }

    if ($method === 'POST') {
        $tagsController->addTag($_POST);
    }
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

if ($url === 'updateHike') {

    $hikesController = new HikesController();
    if ($method === 'GET') {
        $hikesController->showUpdateHikeForm();
    }

    if ($method === 'POST') {
        $hikesController->updateHike($_POST);
    }
}

if ($url === 'addHike') {
    $hikesController = new HikesController();
    $tagsController = new TagsController();

    if ($method === 'GET') {
        $hikesController->showAddHikeForm();
    }

    if ($method === 'POST') {

        $hikesController->addHike($_POST);
    }

}

if ($url === 'logout') {
    $authController  = new AuthController();
    $authController->logout();
}

if ($url === 'myhikes') {
    $hikesController  = new HikesController();
    if ($method === 'GET') {
        $hikesController->showMyHikes();
    }

    if ($method === 'POST') {
        $hikesController->deleteHike($_POST);
    }
}

if ($url === 'myprofile') {
    if ($_SESSION["user"]["isAdmin"] === 0)
    {
        include '../views/header.view.php';
        include '../views/myProfile.view.php';
        include '../views/footer.view.php';
    }
    if ($_SESSION["user"]["isAdmin"] === 1)
    {
        $hikesController = new HikesController();


        $authController = new AuthController();


        include '../views/header.view.php';
        include '../views/adminPanel.view.php';
        include '../views/footer.view.php';
    }
}

if ($url === 'updateProfile') {
    $authController  = new AuthController();

    if ($method === 'GET') {
        $authController->showUpdateProfile();
    }

    if ($method === 'POST') {
        $authController->updateProfile($_POST);
    }
}



    if ($url === 'tag') {
        $HikesController  = new HikesController();
        $tagName = $_GET["name"];

        echo $tagName;

        $HikesController->showHikesForTag($tagName);
    }