<?php

require('src/Controller/AddMovie.php');
require('src/Controller/DetailsMovie.php');
require('src/Controller/ListMovies.php');
require('src/Controller/SignIn.php');
require('src/Controller/SignUp.php');
require('src/Model/Model.php');

$page = filter_input(INPUT_GET,"page");

$route = [
    "addMovie"      => AddMovie::class,
    "detailsMovie"  => DetailsMovie::class,
    "listMovies"     => ListMovies::class,
    "signIn"        => SignIn::class,
    "signUp"        => SignUp::class,
];
$controller = null;

foreach ($route as $routeValue => $className) {
    if($page === $routeValue) {

        $controller = new $className;
        $controller->manage();
    }
}

//error 404
if (!$controller) {
    $controller = new SignIn();
    $controller->manage();
}

?>