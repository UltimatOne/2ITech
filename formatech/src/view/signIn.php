
<h1 class="text-center text-red"><?= $this->title ?></h1>

<form action="" method="post" class="flex flex-col min-h-full w-full items-center gap-4 mt-10 text-2">
    <div class="flex flex-col w-25 gap-4">
        <label for="email" class="">Votre Email</label>
        <input type="email" class="input-custom-red h-16 pl-2" name="email" aria-describedby="emailHelp">
    </div>
    
    <div class="flex flex-col w-25 gap-4">
        <label for="pswrd" class="">Votre mot de passe</label>
        <input type="password" class="input-custom-red h-16 pl-2" name="pswrd">
    </div>
    <button type="submit" class="btn btn-dark w-10 mt-8">Envoyer</button>
</form>