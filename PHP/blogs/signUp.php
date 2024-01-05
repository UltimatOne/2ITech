<?php
include 'components/header.php';
include 'services/userInscriptionCreateValid.php';

?>

<h1 class="text-center">Inscription</h1>

<?php
if (!empty($msgSuccess) or !empty($msgError)) {
    include "components/box.php";
}
?>
<div class="formUser">
    <form action="" method="post">
        <div class="">
            <label for="user_pseudo">Votre Pseudo</label>
            <input type="text" name="user_pseudo">
        </div>
        <div class="">
            <label for="user_firstname">Votre Prénom</label>
            <input type="text" name="user_firstname">
        </div>
        <div class="">
            <label for="user_name">Votre Nom</label>
            <input type="text" name="user_lastname">
        </div>

        <div class="">
            <label for="user_email">Votre Email</label>
            <input type="email" name="user_email">
        </div>
        <div class="">
            <label for="user_pswrd">Votre mot de passe</label>
            <input type="password" name="user_pswrd">
        </div>
        <button type="submit">Envoyer</button>
    </form>
</div>

<?php

include 'components/footer.php';
?>