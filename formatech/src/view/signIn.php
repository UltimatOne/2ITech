<section class="signIn">
    <h1><?= $this->title ?></h1>
    <form action="" method="post">
        <div>
            <label for="email">Votre Email</label>
            <input type="email" class="input-custom-red h-16 pl-2" name="email" aria-describedby="emailHelp">
        </div>

        <div>
            <label for="pswrd">Votre mot de passe</label>
            <input type="password" name="pswrd">
        </div>
        <button type="submit" class="btn btn-dark">Envoyer</button>
    </form>
</section>