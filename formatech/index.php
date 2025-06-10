<?php
session_start();

if (isset($_GET['logout'])) {
    $_SESSION = [];
    session_destroy();
}

require 'vendor/autoload.php';
require 'src/Controller/LandingController.php';
require 'src/Controller/GetCountriesController.php';
require 'src/Controller/DetailsCenterController.php';
require 'src/Controller/ManageCentersController.php';
require 'src/Controller/SignInController.php';
require 'src/Controller/SignUpController.php';
require 'src/Controller/ChatController.php';
require 'src/Controller/MessagePostController.php';

require 'src/Model/Model.php';

require 'src/services/SQLDatabase.php';

$page = filter_input(type: INPUT_GET, var_name: "page");

$route = [
    "landing"        => LandingController::class,
    "getcountries"   => GetCountriesController::class,
    "detailsCenter"  => DetailsCenterController::class,
    "listCenters"    => ManageCentersController::class,
    "signIn"         => SignInController::class,
    "signUp"         => SignUpController::class,
    "chat"           => ChatController::class,
    "message_post"   => MessagePostController::class,
];

$controller = null;

foreach ($route as $routeValue => $className) {
    if ($page === $routeValue) {

        $controller = new $className;
        $controller->manage();
    }
}

//error 404
if (!$controller) {
    $controller = new LandingController();
    $controller->manage();
}
