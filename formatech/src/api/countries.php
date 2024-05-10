<?php

class countries
{
    public $model;
    public $msgSuccess;
    public $msgError;
    public $countries;

    public function __construct()
    {
        $this->model = new Model();
        $this->msgSuccess = null;
        $this->msgError = null;
        $this->countries = [];
    }


    public function manage()
    {
        $this->countries = $this->model->getCountries();
        echo json_encode($this->countries);
    }
}