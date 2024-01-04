<?php
include 'components/header.php';

//Verifie si id existe dans get ou post et le set dans $blogId
if (isset($_GET["id"])) {
    $blogId = $_GET["id"];
} else if (isset($_POST["id"])) {
    $blogId = $_POST["id"];
};

include 'services/userModifBlogIntoBdd.php';
include 'services/getBlogsFromBdd.php';

if (isset($blogId)) {
    $blog = $blogs[$blogId];
    if (isset($_GET['modBlog'])) {
        $contenu = "<form class='container w-50 bg-dark text-center mt-5 rounded-5 py-2 text-white fw-bold mb-2' action='' method='post'>
                        <div class='d-flex flex-column w-75 mx-auto'>
                            <input type='hidden' name='modifBlog' value='modifBlog'>
                            <input type='hidden' name='blog_id' value='" . $blog['blog_id'] . "'>
                            <label for='blog_title'>Titre du blog</label>
                            <input type='text' name='blog_title' value='" . $blog['blog_title'] . "'>
                        </div>
                        <div class='d-flex flex-column w-75 mx-auto'>
                            <label for='blog_content' class='form-label'>Contenu du blog</label>
                            <textarea name='blog_content' cols='80' rows='10' value='" . $blog['blog_content'] . "'>" . $blog['blog_content'] . "</textarea>
                        </div>
                        <a href='blogDetails.php?id=" . $blogId . "' class='btn btn-danger my-2'>Annuler</a>
                        <button type='submit' class='btn btn-dark my-2'>Modifier le blog</button>
                    </form>";
    } else {
        $contenu = "<div class=''>
                        <div class=''>
                            <h1 class=''>" . $blog["blog_title"] . "</h1>
                        </div>
                        <div class=''>
                            <p class=''>" . $blog["blog_content"] . "</p>
                        </div>
                        <div class=''>
                            <p>Ecrit par " . $blog['blog_user_pseudo'] . "</p>
                        </div>
                        <div class=''>
                            <p>Le " . $blog['blog_create_date'] . "</p>
                        </div>
                        <div class=''>
                            <a class='' href='blogDetails.php?comment=" . $blog['blog_id'] . "&id=" . $blogId . "' alt='commenter'>Ajouter un commentaire</a>
                        </div>
                    </div>";
    }
} else {
    $msgError = "<p>Le blog n'a pas été trouvée.</p>";
    $boxButtonParam = "blogs.php";
    $altBoxButtonParam = "retour aux blogs";
    $boxButtonDisplayValue = "Retour aux blogs";
};
?>


<main class="">

    <?php if (isset($_SESSION['user']) && isset($blog) && $_SESSION['user']['pseudo'] == $blog['blog_user_pseudo'] && !isset($_GET['modBlog'])) { ?>
        <div class="">
            <a class='' href="blogDetails.php?modBlog=<?= $blog['blog_id'] ?>&id=<?= $blogId ?>">Modifier le blog</a>
        </div>
    <?php };

    if (!empty($contenu)) {
        echo $contenu;
        if (!empty($msgSuccess) or !empty($msgError)) {
            include "components/box.php";
        }
    } else {
        if (!empty($msgSuccess) or !empty($msgError)) {
            include "components/box.php";
        }
    };

    ?>

</main>

<?php
include 'components/footer.php';
?>