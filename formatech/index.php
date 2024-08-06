<?php
session_start();

if (isset($_GET['logout'])) {
    $_SESSION = [];
    session_destroy();
}

require('src/Controller/Landing.php');
require('src/api/GetCountries.php');
require('src/Controller/DetailsCenter.php');
require('src/Controller/ManageCenters.php');
require('src/Controller/SignIn.php');
require('src/Controller/SignUp.php');
require('src/Model/Model.php');
require('src/services/SQLDatabase.php');

$page = filter_input(INPUT_GET, "page");

$route = [
    "landing"       => Landing::class,
    "getcountries"   => GetCountries::class,
    "detailsCenter"  => DetailsCenter::class,
    "listCenters"    => ManageCenters::class,
    "signIn"        => SignIn::class,
    "signUp"        => SignUp::class,
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
    $controller = new Landing();
    $controller->manage();
}
