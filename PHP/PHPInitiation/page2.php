<?php
var_dump($_GET)
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page 2</title>
</head>

<body>
    <p>Bonjour <?= $_GET["prenom"] ?> <?= $_GET["nom"] ?> votre formulaire a bien été validé</p>
    <p>Votre mail est <?= $_GET["email"] ?> et vous avez <?= $_GET["age"] ?> ans</p>
    <a href="index.php">Accueil</a>
</body>

</html>