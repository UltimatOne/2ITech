<?php

if (isset($_POST['pseudo']) && isset($_POST['pswrd'])) {
    if (empty($_POST['pseudo']) || empty($_POST['pswrd'])) {
        $msgError = "<p>Merci de compléter les champs suivants:";
        foreach ($_POST as $key => $value) {
            if (empty($value)) {
                $msgError .= "<br> -> $key";
            }
        }
        ;
        $msgError .= "</p>";
    } else {
        try {
            $request = $db->prepare('SELECT * FROM users WHERE user_pseudo = ?');
            $request->execute([
                $_POST['pseudo']
            ]);

            //fetch permet de récupérer une seule entrée, utilisé ici parceque la clef est unique (pseudo), pour une clé non unique on utilise fetchall
            $user = $request->fetch();

            //vérification
            if (!$user or !password_verify($_POST['pswrd'], $user['user_pswrd'])) {
                $msgError = "Pseudo ou mot de passe incorrect";

            } else {
                $_SESSION["user"] = [
                    'email' => $user["user_email"],
                    'pseudo' => $user["user_pseudo"]];
            }
            ;

            header("Location: index.php?login=true");

        } catch (Exception $e) {
            var_dump($e->getMessage());
            $msgError = "La connexion a échouée";
        }
    }
}
;

?>