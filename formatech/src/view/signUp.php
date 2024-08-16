<section class="signUp">
    <h1><?= $this->title ?></h1>

    <form action="" method="post">
        <div class="containerInputs">
            <div class="content">
                <div>
                    <label for="name" class="form-label text-white">Votre nom</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div>
                    <label for="firstname" class="form-label text-white">Votre prénom</label>
                    <input type="text" class="form-control" name="firstname">
                </div>
                <div>
                    <label for="email" class="form-label text-white">Votre Email</label>
                    <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp">
                </div>
                <div>
                    <label for="pswrd" class="form-label text-white">Votre mot de passe</label>
                    <input type="password" class="form-control" name="pswrd">
                </div>
                <div>
                    <label for="phone" class="form-label text-white">Votre téléphone</label>
                    <input type="phone" class="form-control" name="phone">
                </div>
                <div class="containerInput custom-select">
                    <label for="country">Pays</label>
                    <select id="country" name="country">
                        <option value="">--------</option>
                    </select>
                </div>
            </div>
            <div id="signUpAddress" class="content hidden">
                <div class="containerAddress">

                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-dark">Envoyer</button>
    </form>
</section>