<?php
session_start();

//Infos de connection à la BDD
require 'bddPass.php';


if (!isset($_SESSION['user'])) {

    $_SESSION['user'] = [];
}

try {
    //connection à la BDD
    $db = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $userName, $pswrd);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    var_dump($e->getMessage());
};

$msgSuccess = "";
$msgError = "";
?>
<!doctype html>
<html lang="fr">

<head>
    <title>Movies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <header class=" position-sticky top-0 z-3 ">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Accueil</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100">

                        <?php if (isset($_SESSION["user"]) && !empty($_SESSION["user"])) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="list.php">Films</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="add.php">Administration</a>
                            </li>
                            <li class="nav-item ms-auto">
                                <span class="nav-link">Bienvenue <?= $_SESSION['user']['firstname'] ?>,</span>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?logout=true">Déconnexion</a>
                            </li>
                            
                        <?php } else { ?>

                            <li class="nav-item ms-auto">
                                <a class="nav-link" href="signIn.php">Connexion</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="signUp.php">Inscription</a>
                            </li>

                        <?php }; ?>

                    </ul>
                </div>
            </div>
        </nav>
    </header>