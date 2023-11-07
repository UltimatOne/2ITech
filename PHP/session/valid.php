<?php
include 'header.php';
$msg = "";
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
    include('boxsuccess.php');
} else {
    include('boxalert.php');
}
?>

<main>
    <h1 class="text-center">Validation</h1>
    <p><?= $msg ?></p>
</main>

<?php
include 'footer.php';
?>