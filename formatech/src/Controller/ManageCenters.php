<?php

class ManageCenters
{
    public $model;
    public $msg;
    public $title;
    public $list_title;
    public $form_title;
    public $centers;
    public $param;
    public $altParam;
    public $displayValue;
    

    public function __construct()
    {
        $this->model = new Model();
        $this->msg = null;
        $this->title = 'Les Centres';
        $this->list_title = 'Liste des centres';
        $this->form_title = 'Ajouter un centre';
        $this->centers = null;
        $this->param = "index.php?page=listCenters";
        $this->altParam = "retour";
        $this->displayValue = "Retour";
    }


    public function manage()
    {
        if (!$_SESSION["user"]["id"]) {
            header(header: "Location: index.php?page=signIn");
            if ($_SESSION['user']['role'] !== 'super_admin') {
                header(header: "Location: index.php?page=accessDenied");
            }
        } else {
            $this->centers = $this->model->getCenters();
        }

        if (isset($_POST['name'])) {

            if (
                empty($_POST['name']) ||
                empty($_POST['address']) ||
                empty($_POST['city_id']) ||
                empty($_POST['phone']) ||
                empty($_POST['email'])
            ) {
                $this->msg = "<p>Merci de compléter les champs suivants:";
                foreach ($_POST as $key => $value) {
                    if (empty($value)) {
                        $this->msg .= "<br> -> $key";
                    }
                };
                $this->msg .= "</p>";
            } else {
                $this->model->addCenter(
                    name: $_POST['name'],
                    address: $_POST['address'],
                    additionalAddress: $_POST['additionalAddress'],
                    email: $_POST['email'],
                    phone: $_POST['phone'],
                    zip: $_POST['zip_code'],
                    city: $_POST['city'],
                    cityId: $_POST['city_id'],
                    countryId: $_POST['country']
                );
                $this->msg = "<p>Le centre " . $_POST['name'] . " a bien été ajouté</p>";
            }
        }


        include(__DIR__ . '/../view/header.php');
        include(__DIR__ . '/../view/popup.php');
        include(__DIR__ . '/../Components/centers/listCenters.php');
        include(__DIR__ . '/../Components/centers/addCenterForm.php');
        include(__DIR__ . '/../view/footer.php');
    }
}
