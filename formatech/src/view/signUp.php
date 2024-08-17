<section class="signUp">
    <h1><?= $this->title ?></h1>

    <form action="" method="post">
        <div class="containerInputs">
            <div class="content">
                <div>
                    <label for="name">Votre nom <span>*</span></label>
                    <input type="text" name="name" id="name">
                </div>
                <div>
                    <label for="firstname">Votre prénom <span>*</span></label>
                    <input type="text" name="firstname" id="firstname">
                </div>
                <div>
                    <label for="birthday">Votre date de naissance <span>*</span></label>
                    <input type="date" name="birthday" id="birthday" min="<?= $this->minDate ?>" max="<?= $this->maxDate ?>" >
                </div>
                <div>
                    <label for="email">Votre Email <span>*</span></label>
                    <input type="text" name="email" id="email">
                </div>
                <div>
                    <label for="phone">Votre téléphone <span>*</span></label>
                    <input type="phone" name="phone" id="phone">
                </div>
                <div>
                    <label for="pswrd">Votre mot de passe <span>*</span></label>
                    <input type="password" name="pswrd" id="pswrd">
                </div>
                <div class="containerInput custom-select">
                    <label for="country">Pays <span>*</span></label>
                    <select id="country" name="country">
                        <option value="">--------</option>
                    </select>
                </div>
            </div>
            <div id="signUpAddress" class="content hidden">
                <div class="containerAddress">

                </div>
            </div>
            <p class="obligation">Tout les champs marqués d'un astérisque <span>*</span> sont obligatoires.</p>
        </div>
        <button type="submit" class="btn btn-dark">Envoyer</button>
    </form>
</section>