<?php

class DetailsMovie
{
    public $model;
    public $msgSuccess;
    public $msgError;

    public function __construct()
    {
        $this->model = new Model();
        $this->msgSuccess = null;
        $this->msgError = null;
    }


    public function manage()
    {




        include (__DIR__ . '/../view/header.php');
        include (__DIR__ . '/../view/popup.php');
        include (__DIR__ . '/../view/detailsMovies.php');
        include (__DIR__ . '/../view/footer.php');
    }
}