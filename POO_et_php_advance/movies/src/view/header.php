<?php /*var_dump($_SESSION);*/ ?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <title>Movies</title>
</head>

<body class="bg-dark">
    <header class="position-sticky top-0 z-3">
        <nav class="navbar navbar-expand-lg bg-white">
            <div class="container-fluid">
                <a class="navbar-brand text-danger fw-bold" href="index.php">MOVIES</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100">

                        <?php if (isset($_SESSION["user"]) && !empty($_SESSION["user"])) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=listMovies">Films</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=addMovie">Ajout de films</a>
                            </li>
                            <li class="nav-item ms-auto">
                                <span class="nav-link">Bienvenue <?= $_SESSION['user']['pseudo'] ?>, </span>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?logout=true">Déconnexion</a>
                            </li>
                            
                        <?php } else { ?>

                            <li class="nav-item ms-auto">
                                <a class="nav-link" href="index.php?page=signIn">Connexion</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=signUp">Inscription</a>
                            </li>

                        <?php }; ?>

                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="d-flex flex-column align-items-center">