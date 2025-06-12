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
        if(isset($_SESSION['user'])) {
            var_dump('<pre>');
            var_dump($_SESSION);
            var_dump('<pre>');
        }

        include __DIR__ . '/../view/header.php';
        include __DIR__ . '/../view/popup.php';
        include __DIR__ . '/../Components/landing.php';
        include __DIR__ . '/../view/footer.php';
    }
}