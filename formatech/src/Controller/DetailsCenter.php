<?php

class DetailsCenter
{
    public $model;
    public $msgSuccess;
    public $msgError;
    public $title;
    public $center;

    public function __construct()
    {
        $this->model = new Model();
        $this->msgSuccess = null;
        $this->msgError = null;
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
                $this->msgError = "Le centre n'a pas été trouvé !";
            } else {
                $this->center = $center;
            }
        }
        



        include (__DIR__ . '/../view/header.php');
        include (__DIR__ . '/../view/popup.php');
        include (__DIR__ . '/../view/detailsMovie.php');
        include (__DIR__ . '/../view/footer.php');
    }
}