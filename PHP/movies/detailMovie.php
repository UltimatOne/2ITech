<?php
include 'header.php';
include 'getMoviesFromBdd.php';
include 'connexionUserCheck.php';



if (isset($_GET['movieId'])) {
    $movie = ($movies[$_GET["movieId"]]);
    $synopsis = $movie["movie_synopsis"] ? $movie["movie_synopsis"] : "Il n'y a pas de synopsis pour ce film";
    $trailers = $movie["movie_trailers"] ? $movie["movie_trailers"] : "<p>Il n'y a pas de trailers pour ce film</p>";
    $detailMovie = "<div class='container w-25 d-flex flex-wrap justify-content-around bg-dark bg-opacity-75 text-white rounded-5 mb-1 mt-2'>
                        <h1 class='text-center'>" . $movie["movie_title"] . "</h1>
                    </div>
                    <div class='container w-25 d-flex flex-wrap justify-content-center align-items-center mb-1 text-light'>
                        <h6 class='fw-bold bg-dark bg-opacity-75 rounded-5 p-2'>" . $movie["movie_cat"] . "</h6>
                    </div>
                    <div class='container w-25 d-flex flex-wrap justify-content-center align-items-center mb-4 text-light'>
                        <h6 class='fw-bold bg-dark bg-opacity-75 rounded-5 p-2'>" . $movie["movie_real"] . " - " . $movie["movie_date"] . "</h6>
                    </div>
                    <div class='w-100 d-flex justify-content-around bg-dark bg-opacity-75 text-white mb-4 rounded-5 p-5'>
                        <img class='d-flex w-25' src=" . $movie["movie_picture"] . " alt='Affiche du film " . $movie["movie_title"] . "'>
                        <div class='d-flex flex-column justify-content-center align-items-center w-75'>
                            <div class='container-fluid d-flex justify-content-center align-items-center my-auto'>
                                <p class='m-auto text-center fs-5'>" . $synopsis . "</p>
                            </div>
                            <div class='d-flex justify-content-center align-items-center text-dark'>
                                " . $trailers . "
                            </div>
                            <p>Durée : " . $movie["movie_duration"] . "</p>
                        </div>
                        </div>
                        <div class='d-flex justify-content-around w-50 mb-2'>
                        <!-- <a class='btn btn-dark' href=''>Modifier</a> -->
                        <a class='btn btn-danger' href='list.php?del=" . $movie["movie_id"] . "'>Supprimer</a>
                        </div>";
                        
                    } else {
                        $msgError = "<p>Le film n'a pas été trouvée.</p>";
                    };
                    
                    ?>
<main class="d-flex flex-column justify-content-center align-items-center " style="position: relative;">
    

<?php
//Verifie qu'il y a bien une enigme dans contenu et l'affiche sinon affiche un message d'erreur
if (!empty($detailMovie)) {
    echo $detailMovie;
    if (!empty($msgSuccess) or !empty($msgError)) {
        echo "<div class='bg-dark bg-opacity-50 d-flex justify-content-center align-items-center' style='position: absolute; z-index: 10; top: 0; bottom: 0; left: 0; right: 0;'>
            <div class='w-25' style=''>";
        include("box.php");
        echo   "</div>
          </div>";
    }
} else {
    if (!empty($msgSuccess) or !empty($msgError)) {
        echo "<div class='bg-dark bg-opacity-50 d-flex justify-content-center align-items-center' style='position: absolute; z-index: 10; top: 0; bottom: 0; left: 0; right: 0;'>
            <div class='w-25'>";
        include("box.php");
        echo   "</div>
        </div>";
    }
}
?>

</main>

<?php
include 'footer.php';
?>