<?php /*var_dump($_SESSION);*/ ?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>FORMATECH</title>
</head>

<body class="">
    <header class="sticky top-0 z-3">
        <nav class="flex min-w-full bg-white" style="height: 7vh">
            <div class="flex w-full items-center">
                <a class="text-3 text-red fw-bold w-10 text-center" href="index.php">FORMATECH</a>
                <?php /*<button class="navbar-toggler" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>*/ ?>
                <div class="flex w-90 p-2" id="">
                    <ul class="flex min-w-full gap-2 text-2">

                        <?php if (isset($_SESSION["user"]) && !empty($_SESSION["user"])) {
                            include(__DIR__ . '/../Components/Navbar/superAdminNavbar.php');
                            include(__DIR__ . '/../Components/Navbar/adminNavbar.php');
                            include(__DIR__ . '/../Components/Navbar/trainerNavbar.php');
                            include(__DIR__ . '/../Components/Navbar/studentNavbar.php');
                        ?>

                            <li class="p-2 ml-auto">
                                <span class="nav-link">Bienvenue <?= $_SESSION['user']['firstname'] ?>, </span>
                            </li>
                            <li class="p-2 mr-6">
                                <a class="nav-link" href="index.php?logout=true">Déconnexion</a>
                            </li>

                        <?php } else { ?>

                            <li class="p-2 ml-auto">
                                <a class="" href="index.php?page=signIn">Connexion</a>
                            </li>
                            <li class="p-2 mr-6">
                                <a class="" href="index.php?page=signUp">Inscription</a>
                            </li>
                        <?php }; ?>

                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="flex flex-col">