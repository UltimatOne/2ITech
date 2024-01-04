<?php
// Valide l'ajout d'un utilisateur à la tab users de la Bdd pandorasbox et set $_SESSION
if (
    isset($_POST['modifUser']) &&
    isset($_POST["user_role"]) &&
    isset($_POST["user_email"])
) {
    if (empty($_POST["user_role"]) || empty($_POST["user_pseudo"]) || empty($_POST["user_email"])) {
        $msgError = "<p>Merci de compléter les champs suivants:";
        foreach ($_POST as $key => $value) {
            if (empty($value)) {
                $msgError .= "<br> -> $key";
            }
        };
        $msgError .= "</p>";
        $boxButtonParam = "add.php";
        $altBoxButtonParam = "retour";
        $boxButtonDisplayValue = "Ok";
    } else {

        //Préparation des valeurs à envoyer
        $id = $_POST["user_id"];
        $role = $_POST["user_role"];
        $name = empty($_POST["user_name"]) ? NULL : $_POST["user_name"];
        $firstname = empty($_POST["user_firstname"]) ? NULL : $_POST["user_firstname"];
        $pseudo = $_POST["user_pseudo"];
        $email = $_POST["user_email"];
        //Hashage du password avant sauvegarde dans BDD
        $pswrdHash = password_hash($_POST["user_pswrd"], PASSWORD_DEFAULT);

        try {

            if (empty($_POST["user_pswrd"])) {
                //Bonne pratique permet de préparer l'envoi sans injection
                $request = $db->prepare("UPDATE users SET user_role = ?,user_pseudo = ?,user_name = ?,user_firstname = ?,user_email = ? WHERE user_id = ?");

                //Envoi
                $request->execute([$role, $pseudo, $firstname, $name, $email, $id]);

                $msgSuccess = $pseudo . " a bien été modifié ";
                $boxButtonParam = "add.php";
                $altBoxButtonParam = "retour";
                $boxButtonDisplayValue = "Terminer";
            } else {

                //Bonne pratique permet de préparer l'envoi sans injection
                $request = $db->prepare("UPDATE users SET user_role = ?,user_pseudo = ?,user_name = ?,user_firstname = ?,user_email = ?,user_pswrd = ? WHERE user_id = ?");

                //Envoi
                $request->execute([$role, $pseudo, $name, $firstname, $email, $pswrdHash, $id]);

                $msgSuccess = $pseudo . " a bien été modifié ";
                $boxButtonParam = "add.php";
                $altBoxButtonParam = "retour";
                $boxButtonDisplayValue = "Terminer";
            };
        } catch (Exception $e) {
            $msgError = "La modification a échouée";
            $boxButtonParam = "add.php";
            $altBoxButtonParam = "retour";
            $boxButtonDisplayValue = "Retour";
        };
    };
};
