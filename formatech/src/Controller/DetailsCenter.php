<?php

class DetailsCenter
{
    private $model;
    private $msg;
    private $title;
    private $param;
    private $altParam;
    private $displayValue;
    private $center;
    private $admins;

    public function __construct()
    {
        $this->model = new Model();
        $this->msg = null;
        $this->title = 'Détails du centre';
        $this->center = [];
        $this->admins = [];
    }


    public function manage(): void
    {
        if(!$_SESSION["user"]["id"]) {
            header(header: "Location: index.php?page=signIn");
        } else {
            $center = $this->model->getCenter(centerId: $_GET["id"]);
            $admins = $this->model->getSelectAdmins();
            // echo '<pre>';
            // var_dump(value: $center);
            // var_dump(value: $admins);
            // echo '</pre>';
            if (empty($center)) {
                $this->msg = "Le centre n'a pas été trouvé !";
                $this->param = "index.php?page=listCenters";
                $this->altParam = "retour à la liste des centres";
                $this->displayValue = "RETOUR";
            } else {
                $this->center = $center;
                $this->admins = $admins;
            }
        }
        

        include (__DIR__ . '/../view/header.php');
        include (__DIR__ . '/../view/popup.php');
        include (__DIR__ . '/../view/detailsCenter.php');
        include (__DIR__ . '/../view/footer.php');
    }
}