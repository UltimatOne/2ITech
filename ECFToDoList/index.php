<?php
session_start();

if(isset($_GET['logout'])) {
    $_SESSION = [];
    session_destroy();
}

require('src/Controller/Landing.php');
require('src/Controller/AddTask.php');
require('src/Controller/Tasks.php');
require('src/Controller/Sign.php');
require('src/Controller/DeleteTask.php');
require('src/Controller/ChangeStatusTask.php');
require('src/Model/Model.php');

$page = filter_input(INPUT_GET,"page");

$route = [
    "landing"           => Landing::class,
    "addTask"           => AddTask::class,
    "tasks"             => Tasks::class,
    "signIn"            => Sign::class,
    "deleteTask"        => DeleteTask::class,
    "changeStatusTask"  => ChangeStatusTask::class,
];

$controller = NULL;

foreach ($route as $routeValue => $className) {
    if($page === $routeValue) {

        $controller = new $className;
        $controller->manage();
    }
}

//error 404
if (!$controller) {
    $controller = new Landing();
    $controller->manage();
}
