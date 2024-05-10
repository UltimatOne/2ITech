<h1 class="text-center text-white"><?= $this->title ?></h1>

<form action="" method="post" class="d-flex flex-column mx-auto" style="width: 60%;">
    <div class="mb-3">
        <label for="name" class="form-label text-white">Votre nom</label>
        <input type="text" class="form-control" name="name">
    </div>
    <div class="mb-3">
        <label for="firstname" class="form-label text-white">Votre prénom</label>
        <input type="text" class="form-control" name="firstname">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label text-white">Votre Email</label>
        <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="pswrd" class="form-label text-white">Votre mot de passe</label>
        <input type="password" class="form-control" name="pswrd">
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label text-white">Votre téléphone</label>
        <input type="phone" class="form-control" name="phone">
    </div>
    <div class="mb-3">
        <label for="address" class="form-label text-white">Votre adresse</label>
        <input type="text" class="form-control" name="address">
    </div>
    <div class="mb-3">
        <label for="zip_code" class="form-label text-white">Votre code postale</label>
        <input type="text" class="form-control" name="zip_code">
    </div>
    <div class="mb-3">
        <label for="city" class="form-label text-white">Votre ville</label>
        <input type="text" class="form-control" name="city">
    </div>
    <div class="mb-3">
        <label for="country" class="form-label text-white">Votre pays</label>
        <input type="text" class="form-control" name="country">
    </div>
    <button type="submit" class="btn btn-dark w-25 mx-auto">Envoyer</button>
</form>