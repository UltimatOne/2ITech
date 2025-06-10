<?php

class SignUpController
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
        // echo '<pre>';
        // var_dump($_POST);
        // echo '<pre>';
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
                // Check password
                // 8 characters, uppercase letter, lowercase letter, number and authorized special character #?!@$%^&*-
                $pattern = '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/';

                if (preg_match($pattern, $_POST["pswrd"])) {

                    // Password hashing before saving to database
                    $pswrd = password_hash(password: $_POST["pswrd"], algo: PASSWORD_DEFAULT);

                    // $userId retrieves the ID of the new user or false if there is a problem during creation
                    $studentId = $this->model->addNewStudent(
                        name: $_POST["name"],
                        firstname: $_POST["firstname"],
                        birthday: $_POST["birthday"],
                        email: $_POST["email"],
                        phone: $_POST["phone"],
                        pswrd: $pswrd,
                        address: $_POST["address"],
                        additionalAddress: $_POST["additionalAddress"],
                        cityId: $_POST["city_id"],
                        city: $_POST["city"],
                        zipCode: $_POST["zip_code"],
                        countryId: $_POST["country"]
                    );

                    if ($studentId > 0) {
                        $_SESSION['user'] = [
                            'name' => $_POST["name"],
                            'firstname' => $_POST["firstname"],
                            'email' => $_POST["email"],
                            'id' => $studentId,
                            'inscription_id' => null,
                            'role' => 'student'
                        ];

                        header(header: 'Location: index.php');
                    } else {
                        $this->msg = 'Erreur ! Merci de réessayer dans un moment !';
                    }
                } else {
                    $this->msg = "Le mot de passe choisi n'est pas valide.<br>Il doit comporter 8 caractères minimum, au moins une majuscule, une minuscule, un chiffre et un caractère spécial";
                }
            }
        };

        include __DIR__ . '/../view/header.php';
        include __DIR__ . '/../view/popup.php';
        include __DIR__ . '/../view/signUp.php';
        include __DIR__ . '/../view/footer.php';
    }
}
