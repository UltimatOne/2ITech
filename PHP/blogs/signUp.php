<?php
include 'components/header.php';
include 'services/userInscriptionCreateValid.php';

?>

<h1 class="text-center">Inscription</h1>

<?php
if (!empty($msgSuccess) or !empty($msgError)) {
    echo
        "<div class='bg-dark bg-opacity-50 d-flex flex-column align-items-center' style='position: absolute; z-index: 10; top: 0; bottom: 0; left: 0; right: 0'>
         <div class='w-25 mt-5'>";
    include "components/box.php";
    echo "</div><a href='signIn.php' class='btn btn-success '>Connexion</a></div>";
}
?>

<form action="" method="post" class="d-flex flex-column mx-auto" style="width: 60%;">
    </div>
    <div class="mb-3">
        <label for="user_pseudo" class="form-label">Votre Pseudo</label>
        <input type="text" class="form-control" name="user_pseudo">
    </div>
    <div class="mb-3">
        <label for="user_firstname" class="form-label">Votre Prénom</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>
    <div class="mb-3">
        <label for="user_name" class="form-label">Votre Nom</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>
    
    <div class="mb-3">
        <label for="user_email" class="form-label">Votre Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>
    <div class="mb-3">
        <label for="user_pswrd" class="form-label">Votre mot de passe</label>
        <input type="password" class="form-control" name="user_pswrd">
    </div>
    <button type="submit" class="btn btn-dark w-25 mx-auto">Envoyer</button>
</form>


<?php

include 'components/footer.php';
?>