<?php

class AddMovie
{
    public $model;
    public $msgSuccess;
    public $msgError;
    public $title;
    public $actors;
    public $directors;
    public $categories;

    public function __construct()
    {
        $this->model = new Model();
        $this->msgSuccess = null;
        $this->msgError = null;
        $this->title = 'Ajout de film';
    }


    public function manage()
    {

        if (isset($_POST['title'])) {

            $fileName = null;

            if (
                empty($_POST['title']) ||
                empty($_POST['year']) ||
                empty($_POST['directors']) ||
                empty($_POST['cat']) ||
                empty($_POST['actors'])
            ) {
                $this->msgError = "<p>Merci de compléter les champs suivants:";
                foreach ($_POST as $key => $value) {
                    if (empty($value)) {
                        $this->msgError .= "<br> -> $key";
                    }
                };
            } else {

                if (!empty($_FILES['picture']['name'])) {
                    $msgError = "";
                    $uploadOk = true;
                    $now = date('d-m-Y_H-i-s');

                    $imageFileType = strtolower(pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION));
                    $targetDir = "./src/public/pictures/";
                    $titre = str_replace(" ","",$_POST['title']);
                    $titre = str_replace(":","",$titre);
                    $titre = str_replace("'","_",$titre);
                    $titre = str_replace("é","e",$titre);
                    $titre = str_replace("è","e",$titre);
                    $targetFile = $targetDir . $titre . '-' . $now . '.' . $imageFileType;

                    $checkSize = getimagesize($_FILES['picture']['tmp_name']);

                    if (!$checkSize) {
                        $uploadOk = false;
                        $msgError = 'Attention le fichier que vous avez attaché n\'est pas une image !<br>';
                    }

                    if (file_exists($targetFile)) {
                        $uploadOk = false;
                        $msgError .= 'Un fichier du même nom existe déjà<br>';
                    }

                    if ($_FILES['picture']['size'] > 1000000) {
                        $uploadOk = false;
                        $msgError .= 'Votre image dépasse le poids limite de 1 Mo<br>';
                    }

                    if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg') {
                        $uploadOk = false;
                        $msgError .= 'Ce type de fichier n\'est pas pris en charge<br>';
                    }

                    if ($uploadOk) {
                        if (move_uploaded_file($_FILES['picture']['tmp_name'], $targetFile)) {
                            $titre = str_replace(" ","",$_POST['title']);
                            $titre = str_replace(":","",$titre);
                            $titre = str_replace("'","_",$titre);
                            $titre = str_replace("é","e",$titre);
                            $titre = str_replace("è","e",$titre);
                            $fileName = $titre . '-' . $now . '.' . $imageFileType;
                        } else {
                            $this->msgError = "Echec de l'upload";
                        }
                    } else {
                        $this->msgError = $msgError;
                    }
                };

                if (!$this->msgError) {
                    $synopsis = empty($_POST['synopsis']) ? null : $_POST['synopsis'];
                    $trailer = empty($_POST['trailer']) ? null : $_POST['trailer'];
                    $time = empty($_POST['duration']) ? null : $_POST['duration'];

                    //ajoute le film à la db et récupère son Id
                    $idMovie = $this->model->addMovie(
                        $_POST['title'],
                        $_POST['year'],
                        $synopsis,
                        $trailer,
                        $time,
                        $fileName,
                        $_POST['cat'],
                        $_POST['directors'],
                        $_SESSION['user']['id']
                    );

                    if ($idMovie) {
                        $request = $this->model->addActorsForMovie($_POST['actors'], $idMovie);
                        if ($request) {
                            $this->msgSuccess = "Le film " . $_POST['title'] . " est ajouté !";
                        } else {
                            $this->msgError = 'Erreur ! Merci de réessayser dans un moment !';
                        }
                    } else {
                        $this->msgError = 'Erreur ! Merci de réessayser dans un moment !';
                    }
                }
            }
        }

        $this->actors = $this->model->getActors();
        $this->directors = $this->model->getDirectors();
        $this->categories = $this->model->getCategories();


        include(__DIR__ . '/../view/header.php');
        include(__DIR__ . '/../view/popup.php');
        include(__DIR__ . '/../view/addMovie.php');
        include(__DIR__ . '/../view/footer.php');
    }
}
