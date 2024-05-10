<div class="col-sm">
    <h3 class="text-danger"><?= $this->form_title ?></h3>
    <form action="" method="post" class="d-flex flex-column mx-auto mt-5 " style="width: 60%;" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Nom du centre</label>
            <input id="name" type="text" class="form-control input-focus-custom-red" name="name" autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Adresse</label>
            <input id="address" type="text" class="form-control input-focus-custom-red" name="address" autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="zipCode" class="form-label">Code postal</label>
            <input id="zipCode" type="text" class="form-control input-focus-custom-red" name="zipCode">
        </div>
        <div class="mb-3">
            <label for="city" class="form-label">Ville</label>
            <input id="city" type="text" class="form-control input-focus-custom-red" name="city">
        </div>
        <div class="mb-3">
            <label for="country" class="form-label">Pays</label>
            <input id="country" type="text" class="form-control input-focus-custom-red" name="country" autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Téléphone</label>
            <input id="phone" type="phone" class="form-control input-focus-custom-red" name="phone" autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" type="text" class="form-control input-focus-custom-red" name="email" autocomplete="off">
        </div>
        <button type="submit" class="btn btn-dark w-25 mx-auto">Envoyer</button>
    </form>
</div>