<?php
include 'header.php';
include 'getMoviesFromBdd.php'
?>

<h1 style="text-align:center; margin:20px">Liste des films</h1>
<div class="d-flex flex-wrap justify-content-evenly">
    <?php foreach ($movies as $key => $movie) { ?>

        <div class="card mt-3 " style="width: 24%;">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title text-center ">
                    <?= $movie["movie_title"] ?>
                </h5>
                <h6 class="card-subtitle mx-auto my-2 bg-dark w-50 p-2 text-white  fw-bold text-center rounded-2  ">
                    <?= $movie["movie_cat"] ?>
                </h6>
                <a class="d-flex mx-auto " href="detailMovie.php?movieId=<?= $key ?>">
                    <img class="d-flex w-100" src="<?= $movie["movie_picture"] ?>" alt="affiche du film <?= $movie["movie_title"] ?>">
                </a>
                <p class="card-text text-center">
                    <?= $movie["movie_real"] ?> - <?= $movie["movie_date"] ?>
                </p>

            </div>
        </div>

    <?php } ?>
</div>

<?php
include 'footer.php';
?>