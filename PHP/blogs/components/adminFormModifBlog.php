<?php
?>

<h2>Modifier un blog</h2>
<?php foreach ($blogs as $key => $blog) {
    if (isset($_GET['modBlog']) && $key == $_GET['modBlog']) {
?>
        <form class="container w-50 bg-dark text-center mt-5 rounded-5 py-2 text-white fw-bold mb-2" action="" method="post">
            <div class="d-flex flex-column w-75 mx-auto">
                <input type="hidden" name="modifBlog" value="modifBlog">
                <input type="hidden" name="blog_id" value="<?= $blog['blog_id'] ?>">
                <label for="blog_title">Titre du blog</label>
                <input type="text" name="blog_title" value="<?= $blog['blog_title'] ?>">
            </div>
            <div class="d-flex flex-column w-75 mx-auto">
                <label for="blog_content" class="form-label">Contenu du blog</label>
                <textarea name="blog_content" cols="80" rows="10" value="<?= $blog['blog_content'] ?>"><?= $blog['blog_content'] ?></textarea>
            </div>
            <div class="d-flex flex-column w-75 mx-auto">
                <label for="blog_user_pseudo">Pseudo du créateur du blog</label>
                <input type="text" name="blog_user_pseudo" value="<?= $blog['blog_user_pseudo'] ?>">
            </div>
            <a href="add.php" class="btn btn-danger my-2">Annuler</a>
            <button type="submit" class="btn btn-dark my-2">Modifier le blog</button>
        </form>
<?php
    }
} ?>