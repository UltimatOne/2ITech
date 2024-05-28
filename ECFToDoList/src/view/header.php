<?php /*var_dump($_SESSION);*/ ?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <title>ECF To Do List</title>
</head>

<body class="">
    <header>
        <nav>
            <div class="navbar">
                <a class="navDesktopTitle" href="index.php">ECF To Do List</a>
                <a class="navMobileTitle" href="index.php">ECFTDL</a>
                <div class="navContainerLinks">
                    <ul class="desktopLinks">

                        <?php if (isset($_SESSION["user"]) && !empty($_SESSION["user"])) { ?>
                            <li>
                                <a href="index.php?page=tasks">Tâches</a>
                            </li>
                            <li>
                                <a href="index.php?page=addTask">Ajout de tâche</a>
                            </li>
                            <li class="ml-auto">
                                <span>Bienvenue <?= $_SESSION['user']['firstname'] ?>, </span>
                            </li>
                            <li>
                                <a href="index.php?logout=true">Déconnexion</a>
                            </li>
                            
                        <?php } else { ?>

                            <li class="ml-auto">
                                <a href="index.php?page=signIn">Connexion</a>
                            </li>

                        <?php }; ?>

                    </ul>
                    <ul class="mobileLinks hidden">

                        <?php if (isset($_SESSION["user"]) && !empty($_SESSION["user"])) { ?>
                            <li>
                                <a href="index.php?page=tasks">Tâches</a>
                            </li>
                            <li>
                                <a href="index.php?page=addTask">Ajout de tâche</a>
                            </li>
                            <li>
                                <span>Bienvenue <?= $_SESSION['user']['firstname'] ?>, </span>
                            </li>
                            <li>
                                <a href="index.php?logout=true">Déconnexion</a>
                            </li>
                            
                        <?php } else { ?>

                            <li>
                                <a href="index.php?page=signIn">Connexion</a>
                            </li>

                        <?php }; ?>
                    </ul>
                    <button class="navOpenButton">˅</button>
                    <button class="navCloseButton hidden">˄</button>
                </div>
            </div>
        </nav>
    </header>
    <main>