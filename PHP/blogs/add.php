<?php
include "components/header.php";
include "services/connexionUserCheck.php";
include 'services/addBlogIntoBdd.php';
include 'services/modifBlogIntoBdd.php';
include 'services/userCreateValid.php';
include 'services/modifUserIntoBdd.php';
include 'services/deleteUserToBdd.php';
include 'services/deleteBlogToBdd.php';
include 'services/getBlogsFromBdd.php';
include 'services/getUsersFromBdd.php';

?>
<main class="d-flex justify-content-between position-relative ">
  <?php
  if (!empty($msgSuccess) or !empty($msgError)) {
    include "components/box.php";
  }
  ?>
  <section class="d-flex flex-column align-items-center " style='width: 45%;'>
    <h1 class="text-center">Blogs</h1>
    <div class="d-flex flex-column align-items-center overflow-auto " style="height: 45vh">
      <?php foreach ($blogs as $key => $blog) { ?>
        <div class='row bg-dark text-white justify-content-between py-1 gap-1 w-100 '>
          <p class='col'>
            <?= $blog['blog_title'] ?>
          </p>
          <p class='col'>
            <?= substr($blog['blog_content'], 0, 45) ?>...
          </p>
          <p class='col'>
            <?= $blog['blog_user_pseudo'] ?>
          </p>
          <div class="d-flex justify-content-evenly ">
            <a href="add.php?modBlog=<?= $key ?>" class=' btn btn-success' style="width:40%">Modifier</a>
            <a href="add.php?suppBlog=<?= $blog['blog_id'] ?>" class=' btn btn-danger' style="width:40%">Supprimer</a>
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
  <section class="d-flex flex-column align-items-center " style='width: 45%;'>
    <h1 class="text-center">Utilisateurs</h1>
    <div class="d-flex flex-column align-items-center overflow-auto " style="height: 45vh">
      <?php foreach ($users as $key => $user) { ?>
        <div class='row bg-dark text-white justify-content-between py-1 gap-1 w-100 '>
          <p class='col'>
            <?= $user['user_pseudo'] ?>
          </p>
          <p class='col'>
            <?= $user['user_email'] ?>
          </p>
          <p class='col'>
            <?= $user['user_role'] ?>
          </p>
          <div class="d-flex justify-content-evenly ">
            <a href="add.php?modUser=<?= $key ?>" class='btn btn-success ' style="width:40%">Modifier</a>
            <a href="add.php?suppUser=<?= $user['user_id'] ?>" class='btn btn-danger ' style="width:40%">Supprimer</a>
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