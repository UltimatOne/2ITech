<?php
include 'header.php';
include 'getMoviesFromBdd.php';
if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
    header('Location: signIn.php');
    exit();
};

if (isset($_GET['movieId'])) {
    $movie = ($movies[$_GET["movieId"]]);
    $detailMovie = "<div class='container w-25 d-flex flex-wrap justify-content-around bg-dark bg-opacity-75 text-white rounded-5 mb-4'>
                    <h1 class='text-center'>" . $movie["movie_title"] . "</h1>
                </div>
                <div class='container w-25 d-flex flex-wrap justify-content-center align-items-center mb-4 text-light'>
                    <h6 class='fw-bold bg-dark bg-opacity-75 rounded-5 p-2'>" . $movie["movie_cat"] . "</h6>
                </div>
                <div class='container w-25 d-flex flex-wrap justify-content-center align-items-center mb-4 text-light'>
                    <h6 class='fw-bold bg-dark bg-opacity-75 rounded-5 p-2'>" . $movie["movie_real"] . " - " . $movie["movie_date"] . "</h6>
                </div>
                <div class='w-100 d-flex justify-content-around bg-dark bg-opacity-75 text-white mb-4 rounded-5 p-5'>
                    <img class='w-25 ' src=" . $movie["movie_picture"] . " alt='Affiche du film " . $movie["movie_title"] . "'>
                    <div class='d-flex flex-column justify-content-center align-items-center'>
                        <div class='container-fluid d-flex justify-content-center align-items-center my-auto'>
                            <p class='m-auto text-center fs-5'>" . $movie["movie_synopsis"] . "</p>
                        </div>
                        <div class='d-flex justify-content-center align-items-center text-dark'>
                            " . $movie["movie_trailers"] . "
                        </div>
                    </div>
                </div>";
                
} else {
    // $msgError = "<p>Le film n'a pas été trouvée.</p>";
};

?>
<main class="d-flex flex-column justify-content-center align-items-center " style=" height: 94.2vh; position: relative;">

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