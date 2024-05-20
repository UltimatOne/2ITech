<div class="flex flex-col w-50 p-2 ml-3">
    <h3 class="text-red"><?= $this->form_title ?></h3>
    <form action="" method="post" class="mt-5 flex flex-col items-center h-full w-full gap-4 text-2">
        <div class="flex flex-col mb-3 w-75 mt-10 gap-4">
            <label for="name" class="">Nom du centre</label>
            <input id="name" type="text" class="input-custom-red h-16 pl-2 text-2" name="name" autocomplete="off">
        </div>
        <div class="flex flex-col mb-3 w-75 gap-4">
            <label for="address" class="">Adresse</label>
            <input id="address" type="text" class="input-custom-red h-16 pl-2 text-2" name="address" autocomplete="off">
        </div>
        <div class="flex flex-col mb-3 w-75 gap-4">
            <label for="zipCode" class="">Code postal</label>
            <input id="zipCode" type="text" class="input-custom-red h-16 pl-2 text-2" name="zipCode">
        </div>
        <div class="flex flex-col mb-3 w-75 gap-4">
            <label for="city" class="">Ville</label>
            <input id="city" type="text" class="input-custom-red h-16 pl-2 text-2" name="city">
        </div>
        <div class="flex flex-col mb-3 w-75 gap-4">
            <label for="country" class="">Pays</label>
            <input id="country" type="text" class="input-custom-red h-16 pl-2 text-2" name="country" autocomplete="off">
        </div>
        <div class="flex flex-col mb-3 w-75 gap-4">
            <label for="phone" class="">Téléphone</label>
            <input id="phone" type="phone" class="input-custom-red h-16 pl-2 text-2" name="phone" autocomplete="off">
        </div>
        <div class="flex flex-col mb-3 w-75 gap-4">
            <label for="email" class="">Email</label>
            <input id="email" type="text" class="input-custom-red h-16 pl-2 text-2" name="email" autocomplete="off">
        </div>
        <button type="submit" class="btn btn-dark w-25 mx-auto">Envoyer</button>
    </form>
</div>