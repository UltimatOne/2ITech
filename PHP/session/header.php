<?php
session_start();

// session_destroy();
if (!isset($_SESSION['user'])){
    $_SESSION["user"] = [];
}
// var_dump($_SESSION);

$msgSuccess = "";
$msgAlert = "";
$eleves = [];

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Session</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">ELEVES</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="liste.php">Liste des élèves</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="add.php">Ajouter un élève</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?logout=true">Log out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>