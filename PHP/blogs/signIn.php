<?php
include 'components/header.php';
include 'services/connexionUserValid.php';

?>

<h1 class="text-center">Connexion</h1>

<form action="" method="post" class="d-flex flex-column mx-auto" style="width: 60%;">
    <div class="mb-3">
        <label for="pseudo" class="form-label">Votre Pseudo</label>
        <input type="text" class="form-control" name="pseudo">
    </div>
    <div class="mb-3">
        <label for="pswrd" class="form-label">Votre mot de passe</label>
        <input type="password" class="form-control" name="pswrd">
    </div>
    <button type="submit" class="btn btn-dark w-25 mx-auto">Envoyer</button>
</form>

<?php
include 'components/box.php';
include 'components/footer.php';
?>