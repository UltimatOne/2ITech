<?php
include 'header.php';
if (
    isset($_POST["mail"]) &&
    !empty($_POST["mail"]) &&
    !empty($_POST["password"]) &&
    !empty($_POST["prenom"]) &&
    !empty($_POST["nom"]) &&
    !empty($_POST["telephone"]) &&
    !empty($_POST["adresse"]) &&
    !empty($_POST["birth"])
) {
    $msgSuccess = "<p>Bonjour, l'élève {$_POST["prenom"]} {$_POST["nom"]} a bien été ajouté</p>
  <p>Son mail est {$_POST["mail"]} et il est né le {$_POST["birth"]}</p>";

    //Préparation des données pour ajout dans user
    $data = [
        "mail" => $_POST["mail"],
        "password" => $_POST["password"],
        "prenom" => $_POST["prenom"],
        "nom" => $_POST["nom"],
        "telephone" => $_POST["telephone"],
        "adresse" => $_POST["adresse"],
        "birth" => $_POST["birth"]
    ];
    //Ajout dans user
    array_push($_SESSION['user'], $data);
} else {
    $msgError = "<p>Merci de compléter les champs suivants:";
    foreach ($_POST as $key => $value) {
        if (empty($value)) {
            $msgError .= "<br> -> $key";
        }
    };
    $msgError .= "</p>";
};
?>

<main>
    <h1 class="text-center">Validation</h1>
    <?php include('box.php') ?>
</main>

<?php
include 'footer.php';
?>