<?php

class ChatController
{
    public $model;
    public $msg;
    public $studentFirstname;
    public $param;
    public $altParam;
    public $displayValue;
    public $room;
    public $messages;


    public function __construct()
    {
        $this->model = new Model();
        $this->msg = null;
        $this->studentFirstname = $_SESSION['user']['firstname'];
        $this->param = "index.php?page=home";
        $this->altParam = "retour";
        $this->displayValue = "Retour";
        $this->room = [];
        $this->messages = [];
    }

    public function manage(): void
    {
        // var_dump($_SESSION);
        if (!$_SESSION["user"]["id"]) {
            header(header: "Location: index.php?page=signIn");
        }
        if ($_SESSION['user']['role'] !== 'student') {
            header(header: "Location: index.php?page=accessDenied");
        }
        $this->room = $this->model->getRoom(1);
        $this->messages = $this->model->getMessages(1);
        // echo '<pre>';
        // var_dump($this->messages);
        // echo '<pre>';

        include __DIR__ . '/../Views/header.php';
        include __DIR__ . '/../Views/popup.php';
        include __DIR__ . '/../Views/chat.php';
        include __DIR__ . '/../Views/footer.php';
    }
}
