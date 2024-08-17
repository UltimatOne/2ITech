<?php

class Landing
{
    public $model;
    public $msg;
    public $title;
    public $param;
    public $altParam;
    public $displayValue;


    public function __construct()
    {
        $this->model = new Model();
        $this->msg = null;
        $this->title = 'FORMATECH';
        $this->param = "index.php";
        $this->altParam = "retour";
        $this->displayValue = "Retour";
    }

    

    public function manage()
    {
        // var_dump($_SESSION['user']);

        include (__DIR__ . '/../view/header.php');
        include (__DIR__ . '/../view/popup.php');
        
        include (__DIR__ . '/../view/footer.php');
    }
}