<?php

if (
    isset($_POST["firstname"]) &&
    isset($_POST["email"]) &&
    isset($_POST["pwd"])
) {
    if (empty($_POST["firstname"]) || empty($_POST["email"]) || empty($_POST["pwd"])) {
        $msgError = "<p>Merci de compléter les champs suivants:";
        foreach ($_POST as $key => $value) {
            if (empty($value)) {
                $msgError .= "<br> -> $key";
            }
        };
        $msgError .= "</p>";
    } else {

        //Hashage du password avant sauvegarde dans BDD
        $pwdHash = password_hash($_POST["pwd"], PASSWORD_DEFAULT);
        $firstname = $_POST["firstname"];
        $email = $_POST["email"];

        try {
            //Mauvaise pratique (sans contrôle permet d'injecter du code sql dans les inputs)
            $sql = "INSERT INTO users (user_firstname, user_email, user_pwd) VALUES ('$firstname','$email','$pwdHash')";
            $db->exec($sql);
            $msgSuccess = "l'enregistrement s'est bien effectué";
        } catch (Exception $e) {
            var_dump($e->getMessage());
        };

        $msgSuccess = "<p>Bonjour {$_POST["firstname"]}, vous êtes bien inscrit</p>
                       <p>Votre mail est {$_POST["email"]}</p>";

        //Préparation des données pour ajout dans user
        // $data = [
        //     "firstname" => $_POST["firstname"],
        //     "email" => $_POST["email"],
        //     "prd" => $_POST["pswrd"],
        // ];
        //Ajout dans user
        // array_push($_SESSION['user'], $data);
    }
};

?>