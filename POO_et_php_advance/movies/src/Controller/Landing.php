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
        $this->title = 'MOVIES';
    }


    public function manage()
    {





        include (__DIR__ . '/../view/header.php');
        include (__DIR__ . '/../view/popup.php');
        include (__DIR__ . '/../view/landing.php');
        include (__DIR__ . '/../view/footer.php');
    }
}