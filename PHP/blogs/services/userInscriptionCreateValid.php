<?php

// Valide l'ajout d'un utilisateur à la tab users de la Bdd blogs et set $_SESSION
if (
    isset($_POST["user_email"]) &&
    isset($_POST["user_pswrd"])
) {
    if (empty($_POST["user_pseudo"]) || empty($_POST["user_email"]) || empty($_POST["user_pswrd"])) {
        $msgError = "<p>Merci de compléter les champs suivants:";
        foreach ($_POST as $key => $value) {
            if (empty($value)) {
                $msgError .= "<br> -> $key";
            }
        };
        $msgError .= "</p>";
        $boxButtonParam = "";
        $altBoxButtonParam = "retour";
        $boxButtonDisplayValue = "Retour";
    } else {

        //Préparation des valeurs à envoyer
        $role = "user";
        $pseudo = $_POST["user_pseudo"];
        $firstname = empty($_POST["user_firstname"]) ? NULL : $_POST["user_firstname"];
        $name = empty($_POST["user_name"]) ? NULL : $_POST["user_name"];
        $email = $_POST["user_email"];
        //Hashage du password avant sauvegarde dans BDD
        $pswrdHash = password_hash($_POST["user_pswrd"], PASSWORD_DEFAULT);


        try {
            //préparation de l'envoi
            $request = $db->prepare("INSERT INTO users (user_role,user_pseudo,user_name,user_firstname,user_email,user_pswrd) VALUES (?,?,?,?,?,?)");

            //Envoi
            $request->execute([$role, $pseudo, $name, $firstname, $email, $pswrdHash]);

            $msgSuccess = "Merci " . $pseudo . " pour votre inscription !<br><br> Veuillez vous connecter.";
            $boxButtonParam = "signIn.php";
            $altBoxButtonParam = "connexion";
            $boxButtonDisplayValue = "connexion";
        } catch (Exception $e) {
            // var_dump($e->getMessage());
            $msgError = "L'inscription a échouée";
            $boxButtonParam = "signUp.php";
            $altBoxButtonParam = "retour";
            $boxButtonDisplayValue = "Retour";
        };
    };
};
