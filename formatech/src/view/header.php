<?php /*var_dump($_SESSION);*/ ?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>FORMATECH</title>
    <script src="https://kit.fontawesome.com/0c729dc5d7.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <nav>
            <a href="index.php"><h1>FORMATECH</h1></a>
            <div class="nav-link">
                <?php if (isset($_SESSION["user"]) && !empty($_SESSION["user"])) {
                    include __DIR__ . '/../Components/Navbar/superAdminNavbar.php';
                    include __DIR__ . '/../Components/Navbar/adminNavbar.php';
                    include __DIR__ . '/../Components/Navbar/trainerNavbar.php';
                    include __DIR__ . '/../Components/Navbar/studentNavbar.php';
                ?>
                    <span class="welcome">Bienvenue <?= $_SESSION['user']['firstname'] ?>, </span>
                    <a class="disconnection-link" href="index.php?logout=true">Déconnexion</a>
                <?php } else { ?>
                    <a class="connection-link" href="index.php?page=signIn">Connexion</a>
                    <a href="index.php?page=signUp">Inscription</a>
                <?php }; ?>
            </div>

            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>

        <div class="layer-window"></div>
    </header>
    <main>