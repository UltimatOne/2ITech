<?php

class AddTask
{
    public $model;
    public $msg;
    public $param;
    public $altParam;
    public $displayValue;
    public $title;
    public $priorities;

    public function __construct()
    {
        $this->model = new Model();
        $this->msg = null;
        $this->param = "index.php?page=addTask";
        $this->altParam = "retour";
        $this->displayValue = "Retour";
        $this->title = 'Ajout de tâche';
        $this->priorities = [];
    }


    public function manage()
    {
        if (!$_SESSION["user"]["id"]) {
            header("Location: index.php?page=sign");
        } else {
            $this->priorities = $this->model->getPriorities();

            if (isset($_POST['title'])) {
                if (
                    empty($_POST['title']) ||
                    empty($_POST['description']) ||
                    empty($_POST['priority']) ||
                    empty($_POST['deadline'])
                ) {
                    $this->msg = "<p>Merci de compléter les champs suivants:";
                    foreach ($_POST as $key => $value) {
                        if (empty($value)) {
                            $this->msg .= "<br> -> $key";
                        }
                    };
                } else {

                    $idTask = $this->model->addTask(
                        $_POST['title'],
                        $_POST['description'],
                        $_POST['priority'],
                        $_POST['deadline'],
                        $_SESSION['user']['id']
                    );

                    if ($idTask) {
                        $this->msg = "La tâche " . $_POST['title'] . " est ajoutée !";
                    } else {
                        $this->msg = 'Erreur ! Merci de réessayser dans un moment !';
                    }
                }
            }
        }

        include(__DIR__ . '/../view/header.php');
        include(__DIR__ . '/../view/popup.php');
        include(__DIR__ . '/../view/addTask.php');
        include(__DIR__ . '/../view/footer.php');
    }
}
