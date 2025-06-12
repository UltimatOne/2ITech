<?php
use APP\Services\Services;
class MessagePostController
{
    public $model;
    public $serv;
    public $msgSuccess;
    public $msgError;

    public $response;

    public function __construct()
    {
        $this->model = new Model();
        $this->serv = new Services();
        $this->msgSuccess = null;
        $this->msgError = null;
        $this->response = null;
    }


    public function manage(): void
    {
        $data = json_decode(json: file_get_contents(filename: "php://input"));
        header(header: "Access-Control-Allow-Origin: *");

        $roomId = $inscriptionId = $message = "";

        if (isset($data)) {
            $roomId = $data -> roomId;
            $inscriptionId = $data -> inscriptionId;
            $message = $this->serv->test_input(data: $data -> message);

            $this->response = $this->model->messagePost(roomId: $roomId, inscriptionId: $inscriptionId, message: $message);
        }

        echo $this->response;
    }
}