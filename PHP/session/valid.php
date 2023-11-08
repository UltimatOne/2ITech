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
    $msgSuccess = "<p>Bonjour {$_POST["prenom"]} {$_POST["nom"]} votre formulaire a bien été validé</p>
  <p>Votre mail est {$_POST["mail"]} et vous etes né le {$_POST["birth"]}</p>";
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