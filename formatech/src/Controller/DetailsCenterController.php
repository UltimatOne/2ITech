<?php

class DetailsCenterController
{
    public $model;
    public $msg;
    public $title;
    public $param;
    public $altParam;
    public $displayValue;
    public $center;
    public $admins;

    public function __construct()
    {
        $this->model = new Model();
        $this->msg = null;
        $this->param = null;
        $this->altParam = "fermer le message";
        $this->displayValue = "FERMER";
        $this->title = 'Détails du centre';
        $this->center = [];
        $this->admins = [];
    }


    public function manage(): void
    {
        if (!$_SESSION["user"]["id"]) {
            header(header: "Location: index.php?page=signIn");
        } else {
            if ($_SESSION["user"]["role"] != "super_admin") {
                header(header: "Location: index.php?page=unauthorizedAccess");
            } else {
                if (!empty($_POST) && isset($_POST["center_id"])) {
                    $table = "centers";
                    $namePropertyId = "center_id";
                    $id = $_POST[$namePropertyId];

                    if (isset($_POST["country_id"])) {
                        $this->model->addCityIfNotExit(
                            cityId: $_POST["city_id"],
                            city: $_POST["city_name"],
                            zipCode: $_POST["city_zip_code"],
                            countryId: $_POST["country_id"]
                        );
                        unset($_POST["city_name"], $_POST["city_zip_code"], $_POST["country_id"]);
                    }
                    unset($_POST["center_id"],);

                    $resp = $this->model->updateFields(table: $table, data: $_POST, namePropertyId: $namePropertyId, id: $id);
                    // echo '<pre>';
                    // var_dump($resp);
                    // echo '<pre>';
                    $resp
                        ? $this->msg = "Modification éffectuée"
                        : $this->msg = "Echec de la modification";
                }
                $center = $this->model->getCenter(centerId: $_GET["id"]);
                $admins = $this->model->getSelectAdmins();

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
        }


        include __DIR__ . '/../view/header.php';
        include __DIR__ . '/../view/popup.php';
        include __DIR__ . '/../Components/detailsForm.php';
        include __DIR__ . '/../view/footer.php';
    }
}
