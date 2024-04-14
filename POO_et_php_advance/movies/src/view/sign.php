
<h1 class="text-center"><?= $this->title ?></h1>

<form action="" method="post" class="d-flex flex-column mx-auto" style="width: 60%;" >
    <?php if ($this->displayPseudo) { ?>
        <div class="mb-3">
            <label for="pseudo" class="form-label">Votre Pseudo</label>
            <input type="text" class="form-control" name="pseudo" id="pseudo" style="outline-color: red;">
        </div>
    <?php } ?>
    
    <div class="mb-3">
        <label for="email" class="form-label">Votre Email</label>
        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
    </div>
    
    <div class="mb-3">
        <label for="pswrd" class="form-label">Votre mot de passe</label>
        <input type="password" class="form-control" name="pswrd" id="pswrd">
    </div>
    <button type="submit" class="btn btn-dark w-25 mx-auto">Envoyer</button>
</form>