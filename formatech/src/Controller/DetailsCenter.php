<?php

class DetailsCenter
{
    public $model;
    public $msg;
    public $title;
    public $param;
    public $altParam;
    public $displayValue;
    public $center;

    public function __construct()
    {
        $this->model = new Model();
        $this->msg = null;
        $this->title = 'Détails du centre';
        $this->center = [];
    }


    public function manage()
    {
        if(!$_SESSION["user"]["id"]) {
            header("Location: index.php?page=signIn");
        } else {
            $center = $this->model->getCenter($_GET["id"]);
            if (empty($center)) {
                $this->msg = "Le centre n'a pas été trouvé !";
            } else {
                $this->center = $center;
            }
        }
        


        include (__DIR__ . '/../view/header.php');
        include (__DIR__ . '/../view/popup.php');
        include (__DIR__ . '/../view/detailsCenter.php');
        include (__DIR__ . '/../view/footer.php');
    }
}