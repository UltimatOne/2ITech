<?php

class SignIn
{

    public $model;
    public $msgSuccess;
    public $msgError;

    public $title;

    public function __construct()
    {
        $this->model = new Model();
        $this->msgSuccess = null;
        $this->msgError = null;
        $this->title = 'Connexion';
    }


    public function manage()
    {

        if (isset($_POST['email'])) {
            if (!empty($_POST['email']) && !empty($_POST['pswrd'])) {
                $user = $this->model->getSuperAdmin($_POST['email']);
                $role = null;
                if ($user){
                    $role = 'super_admin';
                }
                if ($user === false) {
                    $user = $this->model->getAdmin($_POST['email']);
                    if ($user){
                        $role = 'admin';
                    }
                }
                if ($user === false) {
                    $user = $this->model->getTrainer($_POST['email']);
                    if ($user){
                        $role = 'trainer';
                    }
                }
                if ($user === false) {
                    $user = $this->model->getStudent($_POST['email']);
                    if ($user){
                        $role = 'student';
                    }
                }
                if ($user === false || !password_verify($_POST['pswrd'], $user['password'])) {
                    $this->msgError = 'Merci de vérifier votre email et mot de passe !';
                } else {
                    $_SESSION['user'] = [
                        'id'    => $user['id'],
                        'email' => $user["email"],
                        'firstname' => $user["firstname"],
                        'role'  => $role
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




        include(__DIR__ . '/../view/header.php');
        include(__DIR__ . '/../view/popup.php');
        include(__DIR__ . '/../view/signIn.php');
        include(__DIR__ . '/../view/footer.php');
    }
}
