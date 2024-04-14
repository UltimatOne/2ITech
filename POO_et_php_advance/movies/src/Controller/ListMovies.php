<?php

class ListMovies
{
    public $model;
    public $msgSuccess;
    public $msgError;
    public $title;
    public $myMovies;
    public $categories;
    public $searchDisplay;
    public $actors;
    public $directors;

    public function __construct()
    {
        $this->model = new Model();
        $this->msgSuccess = null;
        $this->msgError = null;
        $this->title = 'Les Films';
        $this->myMovies = [];
        $this->categories = [];
        $this->searchDisplay = null;
        $this->actors = [];
        $this->directors = [];
    }


    public function manage()
    {
        if (!$_SESSION["user"]["id"]) {
            header("Location: index.php?page=signIn");
        } else {
            $this->categories = $this->model->getCategories();
            $this->actors = $this->model->getActors();
            $this->directors = $this->model->getDirectors();

            if (isset($_POST["cat"]) && !empty($_POST["cat"])) {
                $myMovies = $this->model->getMyMoviesByCategory($_SESSION["user"]["id"], $_POST["cat"]);
                if (empty($myMovies)) {
                    $this->msgError = "Vous n'avez pas encore de films enregistrés dans cette catégorie !";
                } else {
                    //récupére le nom de la catégorie pour l'afficher

                    //avec l'aide d'une requête SQL
                    // $this->catDisplay = $this->model->getCategorie($_POST["cat"]);

                    //ou avec l'aide d'une boucle sur le résultat de la requête pour récupérer toutes les catégories?
                    for ($i = 0; $i < count($this->categories); $i++) {
                        if ($this->categories[$i]["cat_id"] == $_POST["cat"]) {
                            $this->searchDisplay = $this->categories[$i]["cat_name"];
                            break;
                        }
                    }
                    $this->myMovies = $myMovies;
                }
            } elseif (isset($_POST["actor"]) && !empty($_POST["actor"])) {
                $myMovies = $this->model->getMyMoviesByActor($_SESSION["user"]["id"], $_POST["actor"]);
                if (empty($myMovies)) {
                    $this->msgError = "Vous n'avez pas encore de films enregistrés avec cet acteur !";
                } else {
                    //récupére le nom de la catégorie pour l'afficher
                    //à l'aide d'une boucle sur le résultat de la requête pour récupérer toutes les catégories
                    for ($i = 0; $i < count($this->actors); $i++) {
                        if ($this->actors[$i]["actor_id"] == $_POST["actor"]) {
                            $this->searchDisplay = $this->actors[$i]["actor_name"];
                            break;
                        }
                    }
                    $this->myMovies = $myMovies;
                }
            } elseif (isset($_POST["director"]) && !empty($_POST["director"])) {
                $myMovies = $this->model->getMyMoviesByDirectors($_SESSION["user"]["id"], $_POST["director"]);
                if (empty($myMovies)) {
                    $this->msgError = "Vous n'avez pas encore de films enregistrés avec ce réalisateur !";
                } else {
                    //récupére le nom de la catégorie pour l'afficher
                    //à l'aide d'une boucle sur le résultat de la requête pour récupérer toutes les catégories
                    for ($i = 0; $i < count($this->directors); $i++) {
                        if ($this->directors[$i]["director_id"] == $_POST["director"]) {
                            $this->searchDisplay = $this->directors[$i]["director_firstname"] . " " . $this->directors[$i]["director_name"];
                            break;
                        }
                    }
                    $this->myMovies = $myMovies;
                }
            }else {
                $myMovies = $this->model->getMyMovies($_SESSION["user"]["id"]);
                if (empty($myMovies)) {
                    $this->msgError = "Vous n'avez pas encore de films enregistrés !";
                } else {
                    $this->myMovies = $myMovies;
                }
            }
        }


        include(__DIR__ . '/../view/header.php');
        include(__DIR__ . '/../view/popup.php');
        include(__DIR__ . '/../view/listMovies.php');
        include(__DIR__ . '/../view/footer.php');
    }
}
