<h1><?= $this->title ?></h1>

<form action="" method="post" class="d-flex flex-column mx-auto" style="width: 60%;" enctype="multipart/form-data">
    
    <div class="mb-3">
        <label for="title" class="form-label">Titre</label>
        <input type="text" class="form-control" name="title" id="title">
    </div>
    <div class="mb-3">
        <label for="year" class="form-label">Année de sortie</label>
        <input type="number" min="1830" max="2200" class="form-control" name="year" id="year">
    </div>
    <div class="mb-3">
        <label for="synopsis" class="form-label">Synopsis</label>
        <textarea class="form-control" name="synopsis" id="synopsis"></textarea>
    </div>
    <div class="mb-3">
        <label for="trailer" class="form-label">Trailers</label>
        <input type="text" class="form-control" name="trailer" id="trailer">
    </div>
    <div class="mb-3">
        <label for="duration" class="form-label">Durée</label>
        <input type="time" class="form-control" name="duration" id="duration">
    </div>
    <div class="mb-3">
        <label for="picture" class="form-label">Affiche du film</label>
        <input class="form-control" type="file" id="formFile" name='picture'>
    </div>
    <div class="form-group">
    <label for="cat">Catégorie</label>
        <select class="form-control" id="cat" name="cat">
            <option value="" selected>--------</option>
            <?php foreach ($this->categories as $cat) {
                echo "<option value='{$cat['cat_id']}'>{$cat['cat_name']}</option>";
            } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="directors">Réalisateur</label>
        <select class="form-control" id="directors" name="directors">
            <option value="" selected>--------</option>
            <?php foreach ($this->directors as $director) {
                echo "<option value='{$director['director_id']}'>{$director['director_firstname']} {$director['director_name']}</option>";
            } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="actors">Acteurs</label>
        <select class="form-control" id="actors" name="actors[]" multiple>
            <option value="" selected>--------</option>
            <?php foreach ($this->actors as $actor) {
                echo "<option value='{$actor['actor_id']}'>{$actor['actor_name']}</option>";
            } ?>
        </select>
    </div>
    <button type="submit" class="btn btn-dark w-25 mx-auto">Envoyer</button>
</form>