<?php
include 'header.php';

//unset(' ici l'élément ') permet de supprimer un élément indiqué dans un tableau
if (isset($_GET["suppr"])) {
    $cle = $_GET["suppr"];
    //var_dump("id: " . $cle);
    unset($_SESSION['user'][$cle]);
    $msgSuccess = "l'élève a bien été supprimé";
};

//Affichage si user a des élèves enregistrés sinon messag liste vide
if (!empty($_SESSION['user'])) {
    //Affichage de tout les élèves si $eleveAvecCom est = à 0 sinon affichage de ceux avec commentaires
    foreach ($_SESSION['user'] as $key => $value) {
        if ((isset($_GET['filtre']) && $_GET['filtre'] === 'true' && isset($value['commentaire'])) or !isset($_GET['filtre'])) {
            $msgCard .= "<div class='card' style='width: 18rem;'>
                                <div class='card-body'>
                                    <h5 class='card-title'>" . $value["prenom"] . " " . $value["nom"] . "</h5>
                                    <h6 class='card-subtitle mb-2 text-body-secondary'>Date de naissance: " . $value["birth"] . "</h6>
                                    <p class='card-text'>" . $value["adresse"] . "</p>
                                    <a type='button' class='btn btn-dark' href='data.php?id=$key'>Voir le détail</a><br>"
                                    //Appel de unset par methode get (envoi dans l'url) avec href */
                                  . "<br><a type='button' class='btn btn-danger' href='liste.php?suppr=$key'>Supprimer l'élève</a>
                                </div>
                            </div>";
        };
    };
} else {
    $msgError = "Il n'y a pas d'élèves enregistrés";
};
?>

<main class="container">
    <h1 class="text-center">Liste Des Elèves</h1>
    <?php
    if (!isset($_GET['filtre'])) { ?>
        <a href="liste.php?filtre=true">Uniquement avec commentaire</a>
    <?php } else { ?>
        <a href="liste.php">Tous les élèves</a>
    <?php } ?>
    <div>
        <?php include("card.php") ?>
        <?php include("box.php") ?>
    </div>

</main>

<?php
include 'footer.php';
?>