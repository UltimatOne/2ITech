<?php
include 'header.php';
?>

<main class="container">
    <form action="valid.php" method="post" class="container">
        <div class="form-group">
            <label for="mail" class="form-label">Email</label>
            <input type="email" class="form-control" id="mail" aria-describedby="emailHelp" placeholder="Entrer votre email" name="mail">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="text" class="form-control" id="password" placeholder="Votre mot de passe" name="password">
        </div>
        <div class="form-group">
            <label for="prenom">Prenom</label>
            <input type="text" class="form-control" id="prenom" placeholder="Votre prénom" name="prenom">
        </div>
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" placeholder="Votre nom" name="nom">
        </div>
        <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="tel" class="form-control" id="telephone" placeholder="Votre téléphone" name="telephone">
        </div>
        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" class="form-control" id="adresse" placeholder="Votre Adresse" name="adresse">
        </div>
        <div class="form-group">
            <label for="birth">Date de Naissance</label>
            <input type="date" class="form-control" id="birth" name="birth">
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</main>

<?php
include 'footer.php';
?>