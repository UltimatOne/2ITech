<?php


class SignInController
{

    public $model;
    public $msg;
    public $title;
    public $param;
    public $altParam;
    public $displayValue;
    public $user;
    public $inscriptionId;
    public $role;

    public function __construct()
    {
        $this->model = new Model();
        $this->msg = null;
        $this->title = 'Connexion';
        $this->param = "index.php?page=signIn";
        $this->altParam = "retour";
        $this->displayValue = "Retour";
        $this->user = null;
        $this->inscriptionId= null;
        $this->role = null;
    }


    public function manage(): void
    {
        if (isset($_POST['email'])) {
            if (!empty($_POST['email']) && !empty($_POST['pswrd'])) {
                $this->user = $this->model->getSuperAdmin(email: $_POST['email']);

                if ($this->user) {
                    $this->role = 'super_admin';
                }
                if ($this->user === false) {
                    $this->user = $this->model->getAdmin(email: $_POST['email']);
                    if ($this->user) {
                        $this->role = 'admin';
                    }
                }
                if ($this->user === false) {
                    $this->user = $this->model->getTrainer(email: $_POST['email']);
                    if ($this->user) {
                        $this->role = 'trainer';
                    }
                }
                if ($this->user === false) {
                    $this->user = $this->model->getStudent(email: $_POST['email']);
                    if ($this->user) {
                        $this->inscriptionId = $this->model->getInscription(studentId: $this->user["id"]);
                        $this->user["inscription_id"] = $this->inscriptionId["inscription_id"]; 
                        $this->role = 'student';
                    }
                }
                if ($this->user === false || !password_verify(password: $_POST['pswrd'], hash: $this->user['password'])) {

                    $this->msg = 'Merci de vérifier votre email et mot de passe !';
                } else {
                    isset($this->user["inscription_id"])
                        ? $_SESSION['user'] = [
                            'id' => $this->user['id'],
                            'email' => $this->user["email"],
                            'firstname' => $this->user["firstname"],
                            'inscription_id' => $this->user["inscription_id"],
                            'role' => $this->role,
                        ]
                        : $_SESSION['user'] = [
                            'id' => $this->user['id'],
                            'email' => $this->user["email"],
                            'firstname' => $this->user["firstname"],
                            'role' => $this->role,
                        ];

                    header(header: 'Location: index.php');
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




        include __DIR__ . '/../view/header.php';
        include __DIR__ . '/../view/popup.php';
        include __DIR__ . '/../view/signIn.php';
        include __DIR__ . '/../view/footer.php';
    }
}
