<?php
include 'components/header.php';
include 'services/logOut.php';
include 'services/logIn.php';

?>

<main class="homeBody">
    <h1 class="">Bienvenue sur Blog.fr</h1>
    <div class="">
        <p>Le site où l'on peut parler de tout (enfin presque!)</p>
    </div>
    <?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])) { ?>
                <div class="intro">
                    <h2>Bonjour <?= $_SESSION['user']['pseudo']?></h2>
                    <p>Nous sommes ravis de votre visite</p>
                    <a class="bouton bouton_dark" href="blogs.php" alt="blogs">Derniers blogs</a>
                </div>
    <?php } else { ?>
        <div class="intro">
           <h2>Vous devez être inscrit pour ajouter et gérer vos blogs</h2>
           <a class="bouton bouton_white" href="signUp.php" alt="Inscription">Inscription</a>
           <h2>Déjà inscrit ?</h2>
           <a class="bouton bouton_dark" href="signIn.php" alt="Connexion">Connexion</a>
        </div>
    <?php }; ?>
</main>

<?php
include 'components/box.php';
include 'components/footer.php';
?>