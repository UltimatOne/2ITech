<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css">
    <title>PHP</title>
</head>

<body>
    <form action="page2.php" method="post" class="formulaire">
        <h3>Formulaire de contact</h3>
        <div class="mainForm">
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
                <input type="email" id="mail" name="mail">
            </div>
            <div class="containerInput">
                <label for="age">Votre age</label>
                <input type="number" id="age" name="age">
            </div>
        </div>
        <input type="submit" class="envoyer" value="Envoyer">
    </form>
    
</body>

</html>