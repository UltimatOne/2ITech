<?php
?>
    <h2>Ajouter un utilisateur</h2>
    <form action="" method="post"
      class="">
      <div class="">
        <label for="user_role">Rôle</label>
        <select class="" name="user_role">
          <option value="">-----------</option>
          <option value="administrator">Administrateur</option>
          <option value="user">Utilisateur</option>
        </select>
      </div>
      <div class="">
        <label for="user_pseudo" class="">Pseudo</label>
        <input type="text" class="" name="user_pseudo">
      </div>
      <div class="">
        <label for="user_firstname" class="">Prénom</label>
        <input type="text" class="" name="user_firstname">
      </div>
      <div class="">
        <label for="user_name" class="">Nom</label>
        <input type="text" class="" name="user_name">
      </div>
      <div class="">
        <label for="user_email" class="">Email</label>
        <input type="email" class="" name="user_email">
      </div>
      <div class="">
        <label for="user_pswrd" class="">mot de passe</label>
        <input type="password" class="" name="user_pswrd">
      </div>
      <button type="submit" class="">Envoyer</button>
    </form>