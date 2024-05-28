<?php

class changeStatusTask
{

    public $model;
    public $success;
    public $error;

    public function __construct()
    {
        $this->model = new Model();
        $this->success = "";
        $this->error = "";
    }


    public function manage() {

        if (isset($_SESSION['user']['id'])) {
            if (isset($_POST['taskId'])) {
               $this->success = $this->model->changeStatusTask($_POST['taskId'], $_POST["status_id"]);
               return $this->success;
            } else {
                return $this->error = false;
            };
        } else {
            return $this->error = false;
        }

    }
}