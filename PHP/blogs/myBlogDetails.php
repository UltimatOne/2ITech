<?php
include 'components/header.php';

//Verifie si id existe dans get ou post et le set dans $blogId
if (isset($_GET["id"])) {
    $blogId = $_GET["id"];
} else if (isset($_POST["id"])) {
    $blogId = $_POST["id"];
};

include 'services/userDeleteBlogToBdd.php';
include 'services/ModMyBlogIntoBdd.php';
include 'services/getMyBlogsFromBdd.php';

if (isset($blogId)) {
    $blog = $blogs[$blogId];
    if (isset($_GET['modBlog'])) {
        $contenu = "<h1>Modification du blog</h1>
                    <form  action='' method='post' class=''>
                        <div>
                            <input type='hidden' name='modifBlog' value='modifBlog'>
                            <input type='hidden' name='blog_id' value='" . $blog['blog_id'] . "'>
                            <label for='blog_title'>Titre du blog</label>
                            <input type='text' name='blog_title' value='" . $blog['blog_title'] . "'>
                        </div>
                        <div>
                            <label for='blog_content'>Contenu du blog</label>
                            <textarea name='blog_content' cols='80' rows='10' value='" . $blog['blog_content'] . "'>" . $blog['blog_content'] . "</textarea>
                        </div>
                        <div>
                            <select name='blog_state'>
                              <option value='Brouillon'>Brouillon</option>
                              <option value='Prêt'>Prêt</option>
                              <option value='Publié'>Pubié</option>
                            </select>
                        <div>
                        <div class='form-buttons-container'>
                            <a href='myblogDetails.php?id=" . $blogId . "' class=''>Annuler</a>
                            <button type='submit' class=''>Modifier le blog</button>
                        </div>
                    </form>";
    } else {
        $contenu = "<div class='details'>
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
                          <span>Le " . $blog['blog_create_date'] . "</span>
                          <span style='margin-left: 5%'>Statut : " . $blog['blog_state'] . "</span>
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


<main class="homeBody">

    <?php

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
    if (isset($_SESSION['user']) && isset($blog) && $_SESSION['user']['pseudo'] == $blog['blog_user_pseudo'] && !isset($_GET['modBlog'])) { ?>
        <div class="listeBoutons">
            <a class='boutonsListe bouton_green width25' href="myBlogDetails.php?modBlog=<?= $blog['blog_id'] ?>&id=<?= $blogId ?>">Modifier</a>
            <a class='boutonsListe bouton_red width25' href="myBlogDetails.php?suppBlog=<?= $blog['blog_id'] ?>&id=<?= $blogId ?>">Supprimer</a>
        </div>
    <?php }; ?>

</main>

<?php
include 'components/footer.php';
?>