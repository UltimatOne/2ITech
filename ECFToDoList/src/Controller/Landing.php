<?php

class Landing
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
        $this->param = "index.php";
        $this->altParam = "retour";
        $this->displayValue = "Retour";
        $this->title = 'To Do';
    }


    public function manage()
    {


        include (__DIR__ . '/../view/header.php');
        include (__DIR__ . '/../view/popup.php');
        include (__DIR__ . '/../view/landing.php');
        include (__DIR__ . '/../view/footer.php');
    }
}