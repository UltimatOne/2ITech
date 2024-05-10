<?php

class SignUp
{
    public $model;
    public $msgSuccess;
    public $msgError;

    public $title;
    public $countryId;
    public $cityId;

    public function __construct()
    {
        $this->model = new Model();
        $this->msgSuccess = null;
        $this->msgError = null;
        $this->title = 'Inscription';
        $this->cityId = null;
    }

    public function manage()
    {
        if (
            isset($_POST["name"]) &&
            isset($_POST["email"]) &&
            isset($_POST["pswrd"])
        ) {
            if (
                empty($_POST["name"]) ||
                empty($_POST["firstname"]) ||
                empty($_POST["email"]) ||
                empty($_POST["pswrd"]) ||
                empty($_POST["phone"]) ||
                empty($_POST["address"]) ||
                empty($_POST["zip_code"]) ||
                empty($_POST["city"]) ||
                empty($_POST["country"])
            ) {
                $this->msgError = "<p>Merci de compléter les champs suivants:";
                foreach ($_POST as $key => $value) {
                    if (empty($value)) {
                        $this->msgError .= "<br> -> $key";
                    }
                };
                $this->msgError .= "</p>";
            } else {
                //Hashage du password avant sauvegarde dans BDD
                $pswrd = password_hash( $_POST["pswrd"], PASSWORD_DEFAULT);
                $center = null;

                //$idUser récupère l'id du nouvel utilisateur ou false si problème lors de la création
                $userId = $this->model->addNewUser(
                    $_POST["name"],
                    $_POST["firstname"],
                    $_POST["email"],
                    $pswrd,
                    $_POST["phone"],
                    $_POST["address"],
                    $_POST["zip_code"],
                    $_POST["city"],
                    $_POST["country"]
                );

                if ($userId) {
                    $_SESSION['user'] = [
                        'name' => $_POST["name"],
                        'firstname' => $_POST["name"],
                        'email' => $_POST["email"],
                        'id' => $userId,
                        'role' => 'student'
                    ];

                    header('Location: index.php');
                } else {
                    $this->msgError = 'Erreur ! Merci de réessayer dans un moment !';
                }
            }
        };



        include(__DIR__ . '/../view/header.php');
        include(__DIR__ . '/../view/popup.php');
        include(__DIR__ . '/../view/signUp.php');
        include(__DIR__ . '/../view/footer.php');
    }
}
