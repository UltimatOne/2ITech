<?php

class Sign
{

    public $model;
    public $msg;
    public $param;
    public $altParam;
    public $displayValue;
    public $title;

    public function __construct()
    {
        $this->model = new Model();
        $this->msg = null;
        $this->param = "index.php?page=sign";
        $this->altParam = "retour";
        $this->displayValue = "Retour";
        $this->title = 'Connexion';
    }


    public function manage() {

        if (isset($_POST['email'])) {
            if (!empty($_POST['email']) && !empty($_POST['pswrd'])) {
                $user = $this->model->getUser($_POST['email']);

                if ($user === false) {
                    $this->msg = 'Erreur ! Merci de reéssayer dans un moment !';
                } elseif (!$user || !password_verify($_POST['pswrd'], $user['user_pswrd'])) {
                    $this->msg = 'Merci de vérifier votre email et mot de passe !';
                } else {
                    $_SESSION['user'] = [
                        'firstname'=> $user["user_firstname"],
                        'email' => $user["user_email"],
                        'id'    => $user['user_id'],
                    ];

                    header('Location: index.php');
                };
            } else {
                $this->msg = "<p>Merci de compléter les champs suivants:";
                foreach ($_POST as $key => $value) {
                    if (empty($value)) {
                        $this->msg .= "<br> -> $key";
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