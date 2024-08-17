<?php

class SignUp
{
    public $model;
    public $msg;
    public $param;
    public $altParam;
    public $displayValue;
    public $title;
    public $countryId;
    public $cityId;
    public $maxDate;
    public $minDate;

    public function __construct()
    {
        $this->model = new Model();
        $this->msg = null;
        $this->title = 'Inscription';
        $this->minDate = date("Y-m-d", strtotime("-90 year"));
        $this->maxDate = date("Y-m-d", strtotime("-16 year"));
        $this->cityId = null;
        $this->param = "index.php?page=signUp";
        $this->altParam = "retour";
        $this->displayValue = "Retour";
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
                empty($_POST["birthday"]) ||
                empty($_POST["email"]) ||
                empty($_POST["phone"]) ||
                empty($_POST["pswrd"]) ||
                empty($_POST["address"]) ||
                empty($_POST["zip_code"]) ||
                empty($_POST["city"]) ||
                empty($_POST["country"])
            ) {
                var_dump($_POST);
                $this->msg = "<p>Merci de compléter les champs suivants:";
                foreach ($_POST as $key => $value) {
                    if (empty($value)) {
                        if ($key != "search") {
                            $this->msg .= "<br> -> $key";
                        }
                    }
                };
                $this->msg .= "</p>";
            } else {
                //Hashage du password avant sauvegarde dans BDD
                $pswrd = password_hash( $_POST["pswrd"], PASSWORD_DEFAULT);
                $center = null;

                //$userId récupère l'id du nouvel utilisateur ou false si problème lors de la création
                $studentId = $this->model->addNewStudent(
                    $_POST["name"],
                    $_POST["firstname"],
                    $_POST["birthday"],
                    $_POST["email"],
                    $_POST["phone"],
                    $pswrd,
                    $_POST["address"],
                    $_POST["additionalAddress"],
                    $_POST["zip_code"],
                    $_POST["city"],
                    $_POST["city_id"],
                    $_POST["country"]
                );

                if ($studentId) {
                    $_SESSION['user'] = [
                        'name' => $_POST["name"],
                        'firstname' => $_POST["firstname"],
                        'email' => $_POST["email"],
                        'id' => $studentId,
                        'role' => 'student'
                    ];

                    header('Location: index.php');
                } else {
                    $this->msg = 'Erreur ! Merci de réessayer dans un moment !';
                }
            }
        };



        include(__DIR__ . '/../view/header.php');
        include(__DIR__ . '/../view/popup.php');
        include(__DIR__ . '/../view/signUp.php');
        include(__DIR__ . '/../view/footer.php');
    }
}
