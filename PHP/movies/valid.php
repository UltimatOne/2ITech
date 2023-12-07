<?php
// Valide l'ajout d'un utilisateur à la tab users de la Bdd movies et set $_SESSION
if (
    isset($_POST["firstname"]) &&
    isset($_POST["email"]) &&
    isset($_POST["pswrd"])
) {
    if (empty($_POST["firstname"]) || empty($_POST["email"]) || empty($_POST["pswrd"])) {
        $msgError = "<p>Merci de compléter les champs suivants:";
        foreach ($_POST as $key => $value) {
            if (empty($value)) {
                $msgError .= "<br> -> $key";
            }
        };
        $msgError .= "</p>";
    } else {

        //Préparation des valeurs à envoyer
        $firstname = $_POST["firstname"];
        $email = $_POST["email"];
        //Hashage du password avant sauvegarde dans BDD
        $pswrdHash = password_hash($_POST["pswrd"], PASSWORD_DEFAULT);


        try {
            //Mauvaise pratique (sans contrôle permet d'injecter du code sql dans les inputs)
            // $sql = "INSERT INTO users (user_firstname, user_email, user_pwd) VALUES ('$firstname','$email','$pwdHash')";
            //$db->exec($sql);

            //Bonne pratique permet de préparer l'envoi sans injection
            $request = $db->prepare("INSERT INTO users (user_firstname, user_email, user_pswrd) VALUES (?,?,?)");

            //Envoi
            $request->execute([$firstname, $email, $pswrdHash]);

            //creation de la session utilisateur
            $_SESSION['user'] = [
                'firstname' => $firstname,
                'email' => $email
            ];

            //redirige vers la page index avec l'etat de connection
            header('Location: index.php?login=true');

        } catch (Exception $e) {
            var_dump($e->getMessage());
            $msgError = "L'inscription a échouée";
        };
    };
};

//Valide l'ajout d'un film à la tab movies de la Bdd movies
if (isset($_POST['movie_cat']) && isset($_POST['movie_title'])) {
    if (empty($_POST['movie_cat']) ||
        empty($_POST['movie_title']) ||
        empty($_POST['movie_date']) ||
        empty($_POST['movie_real']) ||
        empty($_POST['movie_picture']) ||
        empty($_POST['movie_duration'])) {
            $msgError = "<p>Merci de compléter les champs suivants:";
            foreach ($_POST as $key => $value) {
                if (empty($value)) {
                    $msgError .= "<br> -> $key";
                }
            };
            $msgError .= "</p>";
    } else {
        //Préparation des valeurs à envoyer
        $cat = $_POST["movie_cat"];
        $title = $_POST["movie_title"];
        $date = $_POST["movie_date"];
        $real = $_POST["movie_real"];
        $synopsis = empty($_POST["movie_synopsis"]) ? NULL : $synopsis = $_POST["movie_synopsis"];
        $picture = $_POST["movie_picture"];
        $trailers = empty($_POST["movie_trailers"]) ? NULL : $_POST["movie_trailers"];
        $duration = $_POST["movie_duration"];
        
        try {
            //Bonne pratique permet de préparer l'envoi sans injection
            $request = $db->prepare("INSERT INTO movies (movie_cat, movie_title, movie_date, movie_real, movie_synopsis, movie_picture, movie_trailers, movie_duration) VALUES (?,?,?,?,?,?,?,?)");
    
            //Envoi
            $request->execute([$cat, $title, $date, $real, $synopsis, $picture, $trailers, $duration]);
            $msgSuccess = "Le film {$title} a bien été ajouté";
        } catch (Exception $e) {
            var_dump($e->getMessage());
            $msgError = "L'ajout du film a échoué";
        };
    }
}
?>