<?php
include 'header.php';
// var_dump($_GET);
// var_dump($_SESSION);

//Pour supprimer la dernière entrée d'un tableau, ici le tableau on supprime la derniere entree dans user qui est dans le tableau $_SESSION pour le 1er exemple
// array_pop( $_SESSION["user"]);

// ici on supprime la derniere entree du tableau correspondant a l'id dans user
// array_pop( $_SESSION["user"][$id]);

//unset(' ici l'élément ') permet de supprimer un élément indiqué dans un tableau
if (isset($_GET["suppr"])) {
    $cle = $_GET["suppr"];
    //var_dump("id: " . $cle);
    unset($_SESSION["user"][$cle]["commentaire"]);
    $msgSuccess = "le commentaire a bien été supprimé";
};

//Verifie qu'un id existe dans $_GET et si oui affiche l'élève correspondant dans $user sinon message d'erreur
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $user = $_SESSION["user"][$id];
    $eleve = "<h1 class='text-center'>Données de l'élève</h1>
                <div class='container bg-dark text-white'>
                    <h3>" . $user["prenom"] . " " . $user["nom"] . "</h3>
                    <p>Mail : <a href='mailto:" . $user["mail"] . "'>" . $user["mail"] . "</a></p>
                    <p>Adresse : " . $user["adresse"] . "</p>
                    <p>Téléphone : " . $user["telephone"] . "</p>
                    <p>Date de naissance : " . $user["birth"] . "</p>
                </div>";
} else {
    $msgError = "<p>L'élève n'a pas été trouvé.</p>";
};

//Verifie la présence d'un commentaire dans $_GET et si oui l'ajoute au user dont c'est l'id
if (
    isset($_GET["commentaire"]) &&
    !empty($_GET["commentaire"])
) {
    $_SESSION["user"][$id]["commentaire"] = $_GET["commentaire"];
};
?>

<main class="">
    
    <?php
    //Verifie qu'il y a bien un user dans eleve et l'affiche sinon affiche un message d'erreur
    if (!empty($eleve)) {
        echo $eleve;
        //verifie qu'il y a un commentaire dans user et si oui l'affiche sinon affiche le formulaire pour creer le commentaire à la place
        if (isset($_SESSION["user"][$id]["commentaire"]) && !empty($_SESSION["user"][$id]["commentaire"])) {
            //verifie qu'il y a un commentaire dans $_GET si oui affiche le message de succes d'ajout et le commentaire sinon juste le commentaire
            if (isset($_GET["commentaire"])) {
                echo "<div class='container bg-dark text-white'><p>Commentaire : " . $_SESSION["user"][$id]["commentaire"] . "</p>
                <a type='button' class='btn btn-danger' href='data.php?suppr=$id'>Supprimer le commentaire</a>
                </div>";
                include "box.php";
            } else {
                echo "<div class='container bg-dark text-white'><p>Commentaire : " . $_SESSION["user"][$id]["commentaire"] . "</p>
                <a type='button' class='btn btn-danger' href='data.php?suppr=". $id . "&id=$id'>Supprimer le commentaire</a>
                </div>";
            }
        } else {
            echo "<div class='container bg-dark text-white'>
                    <form action='' method='get' class='container'>
                        <div class='form-group'>
                            <label for='commentaire' class='form-label'>Votre commentaire ici:</label>
                            <!-- Renvoi l'id dans \$_GET au moment de l'ajout du commentaire -->
                            <input type='hidden' name='id' value='" . $id . "'>
                            <input type='area' class='form-control' id='commentaire' placeholder='Entrer Votre commentaire ici' name='commentaire'>
                            <button type='submit' class='btn btn-primary'>Envoyer</button>
                        </div>
                    </form>
                  </div>";
                  include "box.php";
        }
    } else {
        include("box.php");
    }
    ?>
    
</main>

<?php
include 'footer.php';
?>