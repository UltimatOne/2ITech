<?php ?>
<div class="blogContainer">
  <div class="blogContainerBody">
    <h5 class="">
      <?= $blog["blog_title"] ?>
    </h5>
  </div>
  <div class="blogContainerBody">
    <p class="">
      <?= substr($blog["blog_content"], 0, 45) ?>
    </p>
  </div>
  <div class="blogContainerBody">
    <p class="">
      Par <?= $blog["blog_user_pseudo"] ?>
    </p>
  </div>

  <?php if (isset($_SESSION) && !empty($_SESSION['user'])) { ?>
    <div class="blogContainerBody">
      <a class="bouton bouton_dark" href="myBlogDetails.php?id=<?= $key ?>">Voir</a>
    </div>
  <?php }; ?>

  <div class="blogContainerBody">
    <span class="">Le <?= $blog['blog_create_date'] ?></span>
    <span style="margin-left: 5%">Statut : <?= $blog['blog_state'] ?></span>
  </div>
</div>