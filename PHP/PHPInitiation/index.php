<?php 

$me = [
    "prenom" => 'Jean-Jacques',
    "age" => 45,
];

var_dump($_GET);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
    <link rel="stylesheet" href="styles/index.css">
</head>
<body>
    <a href="page2.php?prenom=<?=$me["prenom"]?>&age=<?=$me["age"]?>">Page 2</a>
    <form action="" class="formulaire">
        <h3>Formulaire de contact</h3>
        <div class="containerInput">
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom">
        </div>
        <div class="containerInput">
        <label for="prenom">Prénom</label>
        <input type="text" id="prenom" name="prenom">
        </div>
        <div class="containerInput">
        <label for="nom">Mail</label>
        <input type="email" id="email" name="mail">
        </div>
        <input type="submit" class="envoyer">
    </form>
</body>
</html>