<?php

class SignUp
{
    public $model;
    public $msgSuccess;
    public $msgError;

    public function __construct()
    {
        $this->model = new Model();
        $this->msgSuccess = null;
        $this->msgError = null;
    }

    public function manage()
    {
        if (
            isset($_POST["pseudo"]) &&
            isset($_POST["email"]) &&
            isset($_POST["pswrd"])
        ) {
            if (empty($_POST["pseudo"]) || empty($_POST["email"]) || empty($_POST["pswrd"])) {
                $this->msgError = "<p>Merci de compléter les champs suivants:";
                foreach ($_POST as $key => $value) {
                    if (empty($value)) {
                        $this->msgError .= "<br> -> $key";
                    }
                };
                $this->msgError .= "</p>";
            } else {
        
                //Préparation des valeurs à envoyer
                $pseudo = $_POST["pseudo"];
                $email = $_POST["email"];
                //Hashage du password avant sauvegarde dans BDD
                $pswrdHash = password_hash($_POST["pswrd"], PASSWORD_DEFAULT);
        
        
                // try {
                //     //Bonne pratique permet de préparer l'envoi sans injection
                //     $request = $db->prepare("INSERT INTO users (user_pseudo, user_email, user_pswrd) VALUES (?,?,?)");
        
                //     //Envoi
                //     $request->execute([$pseudo, $email, $pswrdHash]);
        
                //     //creation de la session utilisateur
                //     $_SESSION['user'] = [
                //         'pseudo' => $pseudo,
                //         'email' => $email
                //     ];
        
                //     //redirige vers la page index avec l'etat de connection
                //     header('Location: index.php?login=true');
        
                // } catch (Exception $e) {
                //     var_dump($e->getMessage());
                //     $msgError = "L'inscription a échouée";
                // };
            };
        };



        include (__DIR__ . '/../view/header.php');
        include (__DIR__ . '/../view/popup.php');
        include (__DIR__ . '/../view/signUp.php');
        include (__DIR__ . '/../view/footer.php');
    }
}