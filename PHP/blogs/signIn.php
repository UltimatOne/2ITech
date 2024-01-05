<?php
include 'components/header.php';
include 'services/connexionUserValid.php';

?>

<h1 class="text-center">Connexion</h1>
<div class="formUser">
    <form action="" method="post">
        <div class="mb-3">
            <label for="pseudo">Votre Pseudo</label>
            <input type="text" name="pseudo">
        </div>
        <div class="mb-3">
            <label for="pswrd">Votre mot de passe</label>
            <input type="password" name="pswrd">
        </div>
        <button type="submit">Envoyer</button>
    </form>
</div>

<?php
include 'components/box.php';
include 'components/footer.php';
?>