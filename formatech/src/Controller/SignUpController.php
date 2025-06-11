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
        function test_input($data): string
        {
            $data = trim(string: $data);
            $data = stripslashes(string: $data);
            $data = htmlspecialchars(string: $data);
            return $data;
        }

        $name = $firstname = $birthday = $email = $phone = $password = "";
        $address = $additionalAddress = $zipCode = $city = $cityId = $country = "";

        if (
            isset($_POST["name"]) &&
            isset($_POST["email"]) &&
            isset($_POST["pswrd"])
        ) {
            $name = test_input(data: $_POST["name"]);
            $firstname = test_input(data: $_POST["firstname"]);
            $birthday = test_input(data: $_POST["birthday"]);
            $email = test_input(data: $_POST["email"]);
            $phone = test_input(data: $_POST["phone"]);
            $password = test_input(data: $_POST["pswrd"]);
            $address = test_input(data: $_POST["address"]);
            $additionalAddress = test_input(data: $_POST["additional_address"]);
            $zipCode = test_input(data: $_POST["zip_code"]);
            $city = test_input(data: $_POST["city"]);
            $cityId = test_input(data: $_POST["city_id"]);
            $country = test_input(data: $_POST["country"]);

            if (
                empty($name) || empty($firstname) ||
                empty($birthday) || empty($email) ||
                empty($phone) || empty($password) ||
                empty($address) || empty($zipCode) ||
                empty($cityId) || empty($country)
            ) {
                // var_dump(value: $_POST);
                $this->msg = "<p>Merci de compléter les champs suivants:";
                foreach ($_POST as $key => $value) {
                    if (empty($value)) {
                        if ($key != "additionalAddress" && $key != "city_id") {
                            $this->msg .= "<br> -> $key";
                        }
                    }
                };
                $this->msg .= "</p>";
            } else {
                // Check password
                // 8 characters, uppercase letter, lowercase letter, number and authorized special character #?!@$%^&*-
                $pattern = '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/';

                if (preg_match(pattern: $pattern, subject: $password)) {

                    // Password hashing before saving to database
                    $pswrd = password_hash(password: $password, algo: PASSWORD_DEFAULT);

                    // $userId retrieves the ID of the new user or false if there is a problem during creation
                    $studentId = $this->model->addNewStudent(
                        name: $name,
                        firstname: $firstname,
                        birthday: $birthday,
                        email: $email,
                        phone: $phone,
                        pswrd: $pswrd,
                        address: $address,
                        additionalAddress: $additionalAddress,
                        cityId: $cityId,
                        city: $city,
                        zipCode: $zipCode,
                        countryId: $country
                    );

                    if ($studentId > 0) {
                        $_SESSION['user'] = [
                            'name' => $name,
                            'firstname' => $firstname,
                            'email' => $email,
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
