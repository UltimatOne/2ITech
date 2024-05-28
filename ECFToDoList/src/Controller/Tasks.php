<?php

class Tasks
{
    public $model;
    public $msg;
    public $param;
    public $altParam;
    public $displayValue;
    public $title;
    public $tasks;
    public $priorities;
    public $status;

    public function __construct()
    {
        $this->model = new Model();
        $this->msg = null;
        $this->param = "index.php?page=tasks";
        $this->altParam = "retour";
        $this->displayValue = "Retour";
        $this->title = 'Tâches';
        $this->tasks = [];
        $this->priorities = [];
        $this->status = [];
    }


    public function manage()
    {
        if (!$_SESSION["user"]["id"]) {
            header("Location: index.php?page=sign");
        } else {
            $this->tasks = $this->model->getTasks($_SESSION['user']['id']);
            $this->priorities = $this->model->getPriorities();
            $this->status = $this->model->getStatus();
        }


        include(__DIR__ . '/../view/header.php');
        include(__DIR__ . '/../view/popup.php');
        include(__DIR__ . '/../view/tasks.php');
        include(__DIR__ . '/../view/footer.php');
    }
}
