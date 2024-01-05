<?php
?>

<h2>Modifier un blog</h2>
<?php foreach ($blogs as $key => $blog) {
    if (isset($_GET['modBlog']) && $key == $_GET['modBlog']) {
?>
        <form class="" action="" method="post">
            <div class="">
                <input type="hidden" name="modifBlog" value="modifBlog">
                <input type="hidden" name="blog_id" value="<?= $blog['blog_id'] ?>">
                <label for="blog_title">Titre du blog</label>
                <input type="text" name="blog_title" value="<?= $blog['blog_title'] ?>">
            </div>
            <div class="">
                <label for="blog_content" class="">Contenu du blog</label>
                <textarea name="blog_content" cols="80" rows="10" value="<?= $blog['blog_content'] ?>"><?= $blog['blog_content'] ?></textarea>
            </div>
            <div class="">
                <label for="blog_user_pseudo">Pseudo du créateur du blog</label>
                <input type="text" name="blog_user_pseudo" value="<?= $blog['blog_user_pseudo'] ?>">
            </div>
            <div>
                <select class="" name="blog_state" value="<?= $blog['blog_state'] ?>">
                    <option value="">-----------</option>
                    <option <?php if ($blog['blog_state'] === "Brouillon") {
                                echo 'selected ';
                            } ?> value="Brouillon">
                        Brouillon</option>
                    <option <?php if ($blog['blog_state'] === "Prêt") {
                                echo 'selected ';
                            } ?> value="Prêt">
                        Prêt</option>
                    <option <?php if ($blog['blog_state'] === "Publié") {
                                echo 'selected ';
                            } ?> value="Publié">
                        Publié</option>
                </select>
            </div>
            <div class="form-buttons-container">
                <a href="add.php" class="">Annuler</a>
                <button type="submit" class="">Envoyer</button>
            </div>
        </form>
<?php
    }
} ?>