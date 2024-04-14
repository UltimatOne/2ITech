<?php

class DetailsMovie
{
    public $model;
    public $msgSuccess;
    public $msgError;
    public $title;
    public $movie;
    public $actors;

    public function __construct()
    {
        $this->model = new Model();
        $this->msgSuccess = null;
        $this->msgError = null;
        $this->title = 'Détails du film';
        $this->movie = [];
        $this->actors = [];
    }


    public function manage()
    {
        if(!$_SESSION["user"]["id"]) {
            header("Location: index.php?page=signIn");
        } else {
            $movie = $this->model->getMovie($_GET["id"]);
            if (empty($movie)) {
                $this->msgError = "Le film n'a pas été trouvé !";
            } else {
                $this->movie = $movie;
            }
        }
        if(isset($this->movie["movie_id"])) {
            $this->actors = $this->model->getActorsOfMovie($this->movie["movie_id"]);
        }
        



        include (__DIR__ . '/../view/header.php');
        include (__DIR__ . '/../view/popup.php');
        include (__DIR__ . '/../view/detailsMovie.php');
        include (__DIR__ . '/../view/footer.php');
    }
}