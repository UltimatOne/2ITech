<h1 class="text-danger"><?= $this->title ?></h1>
<section class="d-flex w-100 pt-2 pb-2" style="height: 89.3vh">
    <aside class="d-flex flex-column text-center border-end border-1 border-danger px-4" style="min-height: 87vh">
        <form action="" method="post" class="d-flex flex-column gap-2 absolute sticky-top" style="top: 10%">
                <div class="d-flex flex-column gap-2">
                    <label class="text-white" for="cat">Filtrer par catégorie</label>
                    <select class="form-select input-focus-custom-red" aria-label="Rechercher par catégorie" name="cat" id="cat">
                        <option value="">Toutes</option>
                        <?php foreach ($this->categories as $key => $cat) { ?>
                            <option id="<?= $cat["cat_id"] ?>" value="<?= $cat["cat_id"] ?>"><?= $cat["cat_name"] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="d-flex flex-column gap-2">
                    <label class="text-white" for="actor">Filtrer par acteur</label>
                    <select class="form-select input-focus-custom-red" aria-label="Rechercher par acteur" name="actor" id="actor">
                        <option value="">Tous</option>
                        <?php foreach ($this->actors as $actor) { ?>
                            <option id="<?= $actor["actor_id"] ?>" value="<?= $actor["actor_id"] ?>"><?= $actor["actor_name"] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="d-flex flex-column gap-2">
                    <label class="text-white" for="director">Filtrer par réalisateur</label>
                    <select class="form-select input-focus-custom-red" aria-label="Rechercher par director" name="director" id="director">
                        <option value="">Tous</option>
                        <?php foreach ($this->directors as $director) { ?>
                            <option id="<?= $director["director_id"] ?>" value="<?= $director["director_id"] ?>"><?= $director["director_firstname"] ?> <?= $director["director_name"] ?></option>
                        <?php } ?>
                    </select>
                </div>
            <button class="btn btn-danger" type='submit'>Rechercher</button>
        </form>
    </aside>
    <article class="container-fluid w-100 text-center overflow-auto">
        <h3 class="text-white" class="pb-4"><?= $this->searchDisplay ?></h3>
        <div class="d-flex w-100 flex-wrap py-2 px-4 gap-4">
            <?php if (!empty($this->myMovies)) {
                foreach ($this->myMovies as $key => $movie) { ?>
                    <div class="card <?php if (count($this->myMovies) < 4) echo "mx-auto"; ?>" style="width: 26.05rem;">
                        <img class="card-img-top" src="./src/public/pictures/<?= $movie['movie_image'] ?>" alt="Affiche du film <?= $movie['movie_title'] ?>">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center"><?= $movie['movie_title'] ?></h5>
                            <p class="card-text h-100 text-center"><?= $movie['movie_release_year'] ?></p>
                            <a href="index.php?page=detailsMovie&id=<?= $movie['movie_id'] ?>" class="btn btn-danger w-50 ms-auto">Détails</a>
                        </div>
                    </div>
            <?php }
            } ?>
        </div>
    </article>
</section>