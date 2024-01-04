<?php

// Valide l'ajout d'un utilisateur à la tab users de la Bdd pandorasbox et set $_SESSION
if (
    !isset($_POST['modifUser']) &&
    isset($_POST["user_role"]) &&
    isset($_POST["user_email"]) &&
    isset($_POST["user_pswrd"])
) {
    if (empty($_POST["user_role"]) || empty($_POST["user_pseudo"]) || empty($_POST["user_email"]) || empty($_POST["user_pswrd"])) {
        $msgError = "<p>Merci de compléter les champs suivants:";
        foreach ($_POST as $key => $value) {
            if (empty($value)) {
                $msgError .= "<br> -> $key";
            }
        }
        ;
        $msgError .= "</p>";
    } else {

        //Préparation des valeurs à envoyer
        $role = $_POST["user_role"];
        $pseudo = $_POST["user_pseudo"];
        $name = empty($_POST["user_name"]) ? NULL : $_POST["user_name"];
        $firstname = empty($_POST["user_firstname"]) ? NULL : $_POST["user_firstname"];
        $email = $_POST["user_email"];
        //Hashage du password avant sauvegarde dans BDD
        $pswrdHash = password_hash($_POST["user_pswrd"], PASSWORD_DEFAULT);

        try {

            //Bonne pratique permet de préparer l'envoi sans injection
            $request = $db->prepare("INSERT INTO users (user_role,user_pseudo,user_name,user_firstname,user_email,user_pswrd) VALUES (?,?,?,?,?,?)");

            //Envoi
            $request->execute([$role, $pseudo, $name, $firstname, $email, $pswrdHash]);

            $msgSuccess = $pseudo . " a bien été ajouté ";
            $boxButtonParam = "add.php";
            $altBoxButtonParam = "retour";
            $boxButtonDisplayValue = "Retour";

        } catch (Exception $e) {
            $msgError = "L'inscription a échouée";
            $boxButtonParam = "add.php";
            $altBoxButtonParam = "retour";
            $boxButtonDisplayValue = "Retour";
        }
        ;
    }
    ;
}
;

?>