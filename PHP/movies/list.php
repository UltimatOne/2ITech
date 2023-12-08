<?php
include 'header.php';
include 'connexionUserCheck.php';
include 'deleteMovieFromBdd.php';
include 'getCatFromBdd.php';
include 'getMoviesFromBdd.php';
?>

<h1 style="text-align:center; margin:20px">Liste des films</h1>
<div class="d-flex flex-wrap flex-column justify-content-evenly">
    <form action="" method="post" class="d-flex justify-content-center  mx-auto w-25">
        <div class="d-flex flex-column">
            <label for="movie_cat">Catégorie du film</label>
            <select class="form-control" id="movie_cat" name="movie_cat">
                <option value="" selected>--------</option>
                <?php foreach ($categories as $categorie) { ?>
                    <option type="submit" value="<?= $categorie['cat_name'] ?>" id="<?= $categorie['cat_id'] ?>"><?= $categorie['cat_name'] ?></option>
                <?php }; ?>
            </select>
        </div>
        <input type="submit" class='btn btn-dark h-50 mt-auto' value="Filtrer"></input>
    </form>
    <div class="d-flex flex-wrap justify-content-evenly ">
        <?php if (!empty($movies)) {
            foreach ($movies as $key => $movie) { ?>
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

            <?php }
        } else {  ?>
            <h3 class="btn btn-danger">Il n'y a pas de films dans cette catégorie</h3>
        <?php } ?>
    </div>
</div>

<?php
include "box.php";
include 'footer.php';
?>