<?php

class SignUp
{
    public $model;
    public $msgSuccess;
    public $msgError;

    public $displayPseudo = true;

    public $title;

    public function __construct()
    {
        $this->model = new Model();
        $this->msgSuccess = null;
        $this->msgError = null;
        $this->title = 'Inscription';
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
                //Hashage du password avant sauvegarde dans BDD
                $pswrd = password_hash($_POST["pswrd"], PASSWORD_DEFAULT);

                //$idUser récupère l'id du nouvel utilisateur ou false si problème lors de la création
                $idUser = $this->model->addNewUser($_POST["pseudo"], $_POST["email"], $pswrd);

                if($idUser) {
                    $_SESSION['user'] = [
                        'pseudo' => $_POST["pseudo"],
                        'email' => $_POST["email"],
                        'id' => $idUser,
                        'role' => 'user'
                    ];

                    header('Location: index.php');
                } else {
                    $this->msgError = 'Erreur ! Merci de réessayer dans un moment !';
                }
            }
        };



        include (__DIR__ . '/../view/header.php');
        include (__DIR__ . '/../view/popup.php');
        include (__DIR__ . '/../view/sign.php');
        include (__DIR__ . '/../view/footer.php');
    }
}