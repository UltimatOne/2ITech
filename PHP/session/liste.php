<?php
include 'header.php';

//Affichage si user a des élèves enregistrés sinon messag liste vide
if (!empty($_SESSION['user'])) {
    foreach ($_SESSION['user'] as $key => $value) {
        $msgSuccess .= "<div class='card' style='width: 18rem;'>
                            <div class='card-body'>
                                <h5 class='card-title'>" . $value["prenom"] . " " . $value["nom"] . "</h5>
                                <h6 class='card-subtitle mb-2 text-body-secondary'>Date de naissance: " . $value["birth"] . "</h6>
                                <p class='card-text'>" . $value["adresse"] . "</p>
                                <a href='data.php?id=$key' class='card-link'>Voir le détail</a>
                            </div>
                        </div>";
    };
} else {
    $msgError = "Il n'y a pas d'élèves enregistrés";
};
?>

<main class="container">
    <h1 class="text-center">Liste Des Elèves</h1>
    <div>
        <?php include("box.php") ?>
    </div>
</main>

<?php
include 'footer.php';
?>