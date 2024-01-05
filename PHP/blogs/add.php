<?php
include "components/header.php";
include "services/connexionUserCheck.php";
include 'services/addBlogIntoBdd.php';
include 'services/modifBlogIntoBdd.php';
include 'services/userCreateValid.php';
include 'services/modifUserIntoBdd.php';
include 'services/deleteUserToBdd.php';
include 'services/deleteBlogToBdd.php';
include 'services/adminGetBlogsFromBdd.php';
include 'services/getUsersFromBdd.php';

?>
<main class="administration">
  <?php
  if (!empty($msgSuccess) or !empty($msgError)) {
    include "components/box.php";
  }
  ?>
  <section class="administrationListes">
    <h1>Blogs</h1>
    <div class="listes">
      <?php foreach ($blogs as $key => $blog) { ?>
        <div class='listeBody'>
          <div class="listeContent">
            <p>
              <?= $blog['blog_title'] ?>
            </p>
            <p>
              <?= substr($blog['blog_content'], 0, 45) ?>...
            </p>
            <p>
              <?= $blog['blog_user_pseudo'] ?>
            </p>
            <p>
              <?= $blog['blog_state']?>
            </p>
          </div>
          <div class="listeBoutons">
            <a href="add.php?modBlog=<?= $key ?>" class='boutonsListe bouton_green width40'>Modifier</a>
            <a href="add.php?suppBlog=<?= $blog['blog_id'] ?>" class='boutonsListe bouton_red width40'>Supprimer</a>
          </div>
        </div>
      <?php } ?>
    </div>
    <?php
    if (isset($_GET['modBlog'])) {
      include "components/adminFormModifBlog.php";
    } else {
      include "components/adminFormAddBlog.php";
    }
    ?>
  </section>
  <section class="administrationListes">
    <h1>Utilisateurs</h1>
    <div class="listes">
      <?php foreach ($users as $key => $user) { ?>
        <div class='listeBody'>
          <div class="listeContent">
            <p>
              <?= $user['user_pseudo'] ?>
            </p>
            <p>
              <?= $user['user_email'] ?>
            </p>
            <p>
              <?= $user['user_role'] ?>
            </p>
          </div>
          <div class="listeBoutons">
            <a href="add.php?modUser=<?= $key ?>" class='boutonsListe bouton_green width40'>Modifier</a>
            <a href="add.php?suppUser=<?= $user['user_id'] ?>" class='boutonsListe bouton_red width40'>Supprimer</a>
          </div>
        </div>
      <?php } ?>
    </div>
    <?php
    if (isset($_GET['modUser'])) {
      include "components/adminFormModifUsers.php";
    } else {
      include "components/adminFormAddUsers.php";
    }
    ?>
  </section>
</main>
<?php
include "components/footer.php";
?>