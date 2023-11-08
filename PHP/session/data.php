<?php
include 'header.php';
// var_dump($_GET);
// var_dump($_SESSION);

//Pour supprimer la dernière entrée d'un tableau, ici le tableau on supprime la derniere entree dans user qui est dans le tableau $_SESSION pour le 1er exemple
// array_pop( $_SESSION["user"]);

// ici on supprime la derniere entree du tableau correspondant a l'id dans user
// array_pop( $_SESSION["user"][$id]);

//Verifie qu'un id existe dans $_GET et si oui affiche l'élève correspondant dans $user sinon message d'erreur
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $user = $_SESSION["user"][$id];
    $eleve = "<h1 class='text-center'>Données de l'élève</h1>
        <h3>" . $user["prenom"] . " " . $user["nom"] . "</h3>
        <p>Mail : <a href='mailto:" . $user["mail"] . "'>" . $user["mail"] . "</a></p>
        <p>Adresse : " . $user["adresse"] . "</p>
        <p>Téléphone : " . $user["telephone"] . "</p>
        <p>Date de naissance : " . $user["birth"] . "</p>";
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

<main class="container bg-dark text-white">
    <?php
    //Verifie qu'il y a bien un user dans eleve et l'affiche sinon affiche un message d'erreur
    if (!empty($eleve)) {
        echo $eleve;
        //verifie qu'il y a un commentaire dans user et si oui l'affiche sinon affiche le formulaire pour creer le commentaire à la place
        if (isset($_SESSION["user"][$id]["commentaire"]) && !empty($_SESSION["user"][$id]["commentaire"])) {
            //verifie qu'il y a un ccommentaire dans $_GET si oui affiche le message de succes d'ajout et le commentaire sinon juste le commentaire
            if (isset($_GET["commentaire"])) {
                $msgSuccess = "<p>Votre commentaire a bien été ajouté";
                echo "<p>Commentaire : " . $_SESSION["user"][$id]["commentaire"] . "</p>";
                include "box.php";
            } else {
                echo "<p>Commentaire : " . $_SESSION["user"][$id]["commentaire"] . "</p>";
            }
        } else {
            echo "<form action='' method='get' class='container'>
                    <div class='form-group'>
                        <label for='commentaire' class='form-label'>Votre commentaire ici:</label>
                        <!-- Renvoi l'id dans \$_GET au moment de l'ajout du commentaire -->
                        <input type='hidden' name='id' value='" . $id . "'>
                        <input type='area' class='form-control' id='commentaire' placeholder='Entrer Votre commentaire ici' name='commentaire'>
                        <button type='submit' class='btn btn-primary'>Envoyer</button>
                    </div>
                  </form>";
        }
    } else {
        include("box.php");
    }
    ?>
    
</main>

<?php
include 'footer.php';
?>