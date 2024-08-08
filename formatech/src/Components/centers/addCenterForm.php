<div class="containerForm">
    <h3 class="text-red"><?= $this->form_title ?></h3>
    <form action="" method="post">
        <div class="containerInput">
            <label for="name">Nom du centre</label>
            <input id="name" type="text" name="name" autocomplete="off">
        </div>
        <div class="containerInput">
            <label for="email">Email</label>
            <input id="email" type="text" name="email" autocomplete="off">
        </div>
        <div class="containerInput">
            <label for="phone">Téléphone</label>
            <input id="phone" type="phone" name="phone" autocomplete="off">
        </div>
        <div class="containerInput custom-select">
            <label for="country">Pays</label>
            <select id="country" name="country">
                <option value="">--------</option>
            </select>
        </div>
        <div class="containerInput custom-select">
            <label for="zipCode">Code postal</label>
            <select id="zipCode" type="text" name="zipCode">
                <option value="">--------</option>
            </select>
        </div>
        <div class="containerInput custom-select">
            <label for="city">Ville</label>
            <select id="city" type="text" name="city">
                <option value="">--------</option>
            </select>
        </div>
        <div class="containerInput">
            <label for="address">Adresse</label>
            <input id="address" type="text" name="address" autocomplete="off">
        </div>
        <div class="containerButton">
            <a class="btn btnAddCenterCancel" href="index.php?page=listCenters">Annuler</a>
            <button type="submit" class="btn btn-dark">Envoyer</button>
        </div>
    </form>
</div>