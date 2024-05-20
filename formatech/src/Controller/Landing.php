<?php

class Landing
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
        $this->title = 'FORMATECH';
    }


    public function manage()
    {
        // var_dump($_SESSION['user']);

        include (__DIR__ . '/../view/header.php');
        include (__DIR__ . '/../view/popup.php');
        include(__DIR__ . '/../Components/headBody.php');
        
        include(__DIR__ . '/../Components/footBody.php');
        include (__DIR__ . '/../view/footer.php');
    }
}