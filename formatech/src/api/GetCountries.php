<?php

class GetCountries
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


    public function manage(): void
    {
        header(header: "Access-Control-Allow-Origin: *");
        // header("Content-Type:application/json");
        
        $this->countries = $this->model->getCountries();

        echo json_encode(value: $this->countries);
    }
}