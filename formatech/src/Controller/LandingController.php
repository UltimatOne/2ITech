<?php

class LandingController
{
    public $model;
    public $msg;
    public $title;
    public $param;
    public $altParam;
    public $displayValue;
    public $logo;


    public function __construct()
    {
        $this->model = new Model();
        $this->msg = null;
        $this->title = 'FORMATECH';
        $this->param = "index.php";
        $this->altParam = "retour";
        $this->displayValue = "Retour";
        $this->logo = "http://localhost2it/formatech/public/pictures/Logo_Formatech.png";
    }

    

    public function manage()
    {
        include __DIR__ . '/../Views/header.php';
        include __DIR__ . '/../Views/popup.php';
        include __DIR__ . '/../Views/landing.php';
        include __DIR__ . '/../Views/footer.php';
    }
}