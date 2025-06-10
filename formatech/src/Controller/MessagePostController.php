<?php

class MessagePostController
{
    public $model;
    public $msgSuccess;
    public $msgError;

    public $response;

    public function __construct()
    {
        $this->model = new Model();
        $this->msgSuccess = null;
        $this->msgError = null;
        $this->response = null;
    }


    public function manage(): void
    {
        $data = json_decode(file_get_contents("php://input"));

        header(header: "Access-Control-Allow-Origin: *");

        if (isset($data)) {
            $this->response = $this->model->messagePost(roomId: $data -> roomId, inscriptionId: $data -> inscriptionId, message: $data -> message);
        }

        echo $this->response;
    }
}