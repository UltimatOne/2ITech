<?php

class SignIn
{

    public $model;
    public $msgSuccess;
    public $msgError;
    public $displayPseudo = false;

    public $title;

    public function __construct()
    {
        $this->model = new Model();
        $this->msgSuccess = null;
        $this->msgError = null;
        $this->title = 'Connexion';
    }


    public function manage() {

        if (isset($_POST['email'])) {
            if (!empty($_POST['email']) && !empty($_POST['pswrd'])) {
                $user = $this->model->getUser($_POST['email']);

                if ($user === false) {
                    $this->msgError = 'Erreur ! Merci de reéssayer dans un moment !';
                } elseif (!$user || !password_verify($_POST['pswrd'], $user['user_pswrd'])) {
                    $this->msgError = 'Merci de vérifier votre email et mot de passe !';
                } else {
                    $_SESSION['user'] = [
                        'pseudo'=> $user["user_pseudo"],
                        'email' => $user["user_email"],
                        'id'    => $user['user_id'],
                        'role'  => $user['role_name']
                    ];

                    header('Location: index.php');
                };
            } else {
                $this->msgError = "<p>Merci de compléter les champs suivants:";
                foreach ($_POST as $key => $value) {
                    if (empty($value)) {
                        $this->msgError .= "<br> -> $key";
                    }
                };
            }
        }




        include (__DIR__ . '/../view/header.php');
        include (__DIR__ . '/../view/popup.php');
        include (__DIR__ . '/../view/sign.php');
        include (__DIR__ . '/../view/footer.php');
    }
}