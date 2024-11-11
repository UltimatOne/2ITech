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
        $this->minDate = date(format: "Y-m-d", timestamp: strtotime("-90 year"));
        $this->maxDate = date(format: "Y-m-d", timestamp: strtotime("-16 year"));
        $this->cityId = null;
        $this->param = "index.php?page=signUp";
        $this->altParam = "retour";
        $this->displayValue = "Retour";
    }

    public function manage(): void
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
                // var_dump(value: $_POST);
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
                $pswrd = password_hash( password: $_POST["pswrd"], algo: PASSWORD_DEFAULT);
                $center = null;

                //$userId récupère l'id du nouvel utilisateur ou false si problème lors de la création
                $studentId = $this->model->addNewStudent(
                    name: $_POST["name"],
                    firstname: $_POST["firstname"],
                    birthday: $_POST["birthday"],
                    email: $_POST["email"],
                    phone: $_POST["phone"],
                    pswrd: $pswrd,
                    address: $_POST["address"],
                    additionalAddress: $_POST["additionalAddress"],
                    zip_code: $_POST["zip_code"],
                    city: $_POST["city"],
                    cityId: $_POST["city_id"],
                    countryId: $_POST["country"]
                );

                if ($studentId) {
                    $_SESSION['user'] = [
                        'name' => $_POST["name"],
                        'firstname' => $_POST["firstname"],
                        'email' => $_POST["email"],
                        'id' => $studentId,
                        'role' => 'student'
                    ];

                    header(header: 'Location: index.php');
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
