<?php
session_start();

if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = [];
}
//Connection à la BDD
include 'services/bddConnect.php';

// var_dump($_SESSION);

$msgSuccess = "";
$msgAlert = "";
$boxButtonParam = "";
$altBoxButtonParam = "";
$boxButtonDisplayValue= "";

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Blog.fr</title>
</head>

<body>
    <header class="position-sticky top-0 z-3 bg-white border border-2 border-dark rounded-2">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand btn btn-dark text-white" href="index.php">Blog.fr</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100">
                        <li class="nav-item">
                            <a class="nav-link" href="blogs.php">Blogs</a>
                        </li>
                        <?php if (isset($_SESSION["user"]) && !empty($_SESSION["user"])) {
                            //Récupère le role de l'utilisateur
                            include 'services/getUserRole.php';

                            //vérifie si l'utilisateur est un administrateur et affiche le lien vers la page si vrai
                            if (isset($role) && $role['user_role'] === "administrator") {
                        ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="add.php">Administration</a>
                                </li>
                            <?php }; ?>
                            <li class="nav-item ms-auto">
                                <span class="nav-link fw-bold me-5">Bonjour
                                    <?= $_SESSION['user']['pseudo'] ?>
                                </span>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-secondary " href="index.php?logout=true">Déconnexion</a>
                            </li>
                        <?php } else { ?>

                            <li class="nav-item ms-auto">
                                <a class="btn btn-dark me-2" href="signIn.php">Connexion</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-light" href="signUp.php">Inscription</a>
                            </li>

                        <?php }; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>