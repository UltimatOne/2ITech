<?php if (isset($this->movie)) { ?>
    <h1><?= $this->movie["movie_title"] ?></h1>
    <h5><?= $this->movie["cat_name"] ?></h5>
<?php } else { ?>
    <h1><?= $this->title ?></h1>
<?php } ?>

<section class="container-fluid d-flex text-center gap-5">
    <img class="" src="./src/public/pictures/<?= $this->movie["movie_image"] ?>" alt="Affiche du film <?= $this->movie["movie_title"] ?>" style="width: 30vw"/>
    <div class="d-flex flex-column justify-content-center w-100">
        <p>Date de sortie : <?= $this->movie["movie_release_year"] ?></p>
        <p>Réalisé par : <?= $this->movie["director_firstname"] ?> <?= $this->movie["director_name"] ?></p>
        <p>Acteurs :</p>
        <p class="d-flex justify-content-center gap-5">
            <?php foreach ($this->actors as $key => $actor) { ?>
                <span><?= $actor["actor_name"]?></span>
            <?php } ?>
        </p>
        <p>Synopsis :</p>
        <p><?= $this->movie["movie_synopsis"] ?></p>
        <iframe
            class="mx-auto"
            width="1036" 
            height="777" 
            src="<?= $this->movie["movie_trailer"] ?>" 
            title="Bande Annonce <?= $this->movie["movie_title"] ?>" 
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
            referrerpolicy="strict-origin-when-cross-origin" 
            allowfullscreen>
        </iframe>
    </div>
</section>