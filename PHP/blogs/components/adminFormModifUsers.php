<?php
?>

<h2>Modifier un utilisateur</h2>

<?php foreach ($users as $key => $user) {
    if (isset($_GET['modUser']) && !empty($_GET['modUser']) && $key == $_GET['modUser']) {
?>
        <form action="" method="post" class="">
            <div class="">
                <input type="hidden" name="modifUser" value="modifUser">
                <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">
                <label for="user_role">Rôle</label>
                <select class="" name="user_role" value="<?= $user['user_role'] ?>">
                    <option value="">-----------</option>
                    <option <?php if ($user['user_role'] === "administrator") {
                                echo 'selected ';
                            } ?> value="administrator">
                        Administrateur</option>
                    <option <?php if ($user['user_role'] === "user") {
                                echo 'selected ';
                            } ?>value="user">Utilisateur</option>
                </select>
            </div>
            <div class="">
                <label for="user_pseudo" class="">Pseudo</label>
                <input type="text" class="" name="user_pseudo" value="<?= $user['user_pseudo'] ?>">
            </div>
            <div class="">
                <label for="user_firstname" class="">Prénom</label>
                <input type="text" class="" name="user_firstname" value="<?= $user['user_firstname'] ?>">
            </div>
            <div class="">
                <label for="user_name" class="">Nom</label>
                <input type="text" class="" name="user_name" value="<?= $user['user_name'] ?>">
            </div>
            <div class="">
                <label for="user_email" class="">Email</label>
                <input type="email" class="" name="user_email" value="<?= $user['user_email'] ?>">
            </div>
            <div class="">
                <label for="user_pswrd" class="">mot de passe</label>
                <input type="password" class="" name="user_pswrd" value="">
            </div>
            <div class="form-buttons-container">
                <a href="add.php" class="">Annuler</a>
                <button type="submit" class="">Envoyer</button>
            </div>
        </form>
<?php
    }
} ?>