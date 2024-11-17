<div class="containerForm">
    <h3><?= $this->form_title ?></h3>
    <form action="" method="post">
        <div class="containerInput">
            <label for="name">Nom du centre <span>*</span></label>
            <input id="name" type="text" name="name" autocomplete="off">
        </div>
        <div class="containerInput">
            <label for="email">Email <span>*</span></label>
            <input id="email" type="text" name="email" autocomplete="off">
        </div>
        <div class="containerInput">
            <label for="phone">Téléphone <span>*</span></label>
            <input id="phone" type="phone" name="phone" autocomplete="off">
        </div>
        <div class="containerInput custom-select">
            <label for="country">Pays <span>*</span></label>
            <select id="country" name="country">
                <option value="">--------</option>
            </select>
        </div>
        <div class="containerAddress">
           
        </div>
        <p class="obligation">Tout les champs marqués d'un astérisque <span>*</span> sont obligatoires.</p>
        <div class="containerButton">
            <a class="btn btnAddCenterCancel" href="index.php?page=listCenters">Annuler</a>
            <button type="submit" class="btn btn-dark">Envoyer</button>
        </div>
    </form>
</div>