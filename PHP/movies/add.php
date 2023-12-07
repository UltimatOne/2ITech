<?php
include 'header.php';
if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
    header('Location: signIn.php');
    exit();
};
include 'valid.php';
include 'getCatFromBdd.php';

?>

<h1 class="text-center">Ajouter un film</h1>

<form action="" method="post" class="d-flex flex-column mx-auto" style="width: 60%;">
    <label for="movie_cat">Catégorie du film</label>
    <select class="form-control" id="movie_cat" name="movie_cat">
        <option value="" selected>--------</option>
        <?php foreach ($categories as $categorie) { ?>
            <option value="<?= $categorie['cat_name'] ?>" id="<?= $categorie['cat_id'] ?>"><?= $categorie['cat_name'] ?></option>
        <?php }; ?>
    </select>
    <div class="mb-3">
        <label for="movie_title" class="form-label">Titre</label>
        <input type="text" class="form-control" name="movie_title" id="movie_title">
    </div>
    <div class="mb-3">
        <label for="movie_date" class="form-label">Date de production</label>
        <input type="number" min="1830" max="2200" class="form-control" name="movie_date" id="movie_date">
    </div>
    <div class="mb-3">
        <label for="movie_real" class="form-label">Réalisateur</label>
        <input type="text" class="form-control" name="movie_real" id="movie_real">
    </div>
    <div class="mb-3">
        <label for="movie_synopsis" class="form-label">Synopsis</label>
        <textarea class="form-control" name="movie_synopsis" id="movie_synopsis"></textarea>
    </div>
    <div class="mb-3">
        <label for="movie_picture" class="form-label">Affiche du film</label>
        <input type="text" class="form-control" name="movie_picture" id="movie_picture">
    </div>
    <div class="mb-3">
        <label for="movie_trailers" class="form-label">Trailers</label>
        <input type="text" class="form-control" name="movie_trailers" id="movie_trailers">
    </div>
    <div class="mb-3">
        <label for="movie_duration" class="form-label">Durée</label>
        <input type="time" class="form-control" name="movie_duration" id="movie_duration">
    </div>
    <button type="submit" class="btn btn-dark w-25 mx-auto">Envoyer</button>
</form>

<?php
include 'box.php';
include 'footer.php';
?>