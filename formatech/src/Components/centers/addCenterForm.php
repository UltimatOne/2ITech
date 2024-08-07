<div class="containerForm">
    <h3 class="text-red"><?= $this->form_title ?></h3>
    <form action="" method="post">
        <div class="containerInput">
            <label for="name">Nom du centre</label>
            <input id="name" type="text" class="input-custom-red" name="name" autocomplete="off">
        </div>
        <div class="containerInput">
            <label for="address" class="">Adresse</label>
            <input id="address" type="text" class="input-custom-red" name="address" autocomplete="off">
        </div>
        <div class="containerInput">
            <label for="zipCode" class="">Code postal</label>
            <input id="zipCode" type="text" class="input-custom-red" name="zipCode">
        </div>
        <div class="containerInput">
            <label for="city" class="">Ville</label>
            <input id="city" type="text" class="input-custom-red" name="city">
        </div>
        <div class="containerInput">
            <label for="country" class="">Pays</label>
            <input id="country" type="text" class="input-custom-red" name="country" autocomplete="off">
        </div>
        <div class="containerInput">
            <label for="phone" class="">Téléphone</label>
            <input id="phone" type="phone" class="input-custom-red" name="phone" autocomplete="off">
        </div>
        <div class="containerInput">
            <label for="email" class="">Email</label>
            <input id="email" type="text" class="input-custom-red" name="email" autocomplete="off">
        </div>
        <div class="containerButton">
            <a class="btn btnAddCenterCancel" href="index.php?page=listCenters">Annuler</a>
            <button type="submit" class="btn btn-dark">Envoyer</button>
        </div>
    </form>
</div>