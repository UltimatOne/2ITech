
<h1 class="text-center text-white"><?= $this->title ?></h1>

<form action="" method="post" class="d-flex flex-column mx-auto" style="width: 60%;">    
    <div class="mb-3">
        <label for="email" class="form-label text-white">Votre Email</label>
        <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
    </div>
    
    <div class="mb-3">
        <label for="pswrd" class="form-label text-white">Votre mot de passe</label>
        <input type="password" class="form-control" name="pswrd">
    </div>
    <button type="submit" class="btn btn-dark w-25 mx-auto">Envoyer</button>
</form>