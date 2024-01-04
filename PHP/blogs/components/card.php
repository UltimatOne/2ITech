<?php ?>
<div class="">
  <div class="">
    <h5 class="">
      <?= $blog["blog_title"] ?>
    </h5>
    <p class="">
      <?= substr($blog["blog_content"], 0, 45) ?>
    </p>
    <p class="">
      Par <?= $blog["blog_user_pseudo"] ?>
    </p>
    <?php if (isset($_SESSION) && !empty($_SESSION['user'])) { ?>
      <a class="" href="blogDetails.php?id=<?= $key ?>">Voir</a>
    <?php }; ?>
    <p class="">Le <?= $blog['blog_create_date'] ?></p>
  </div>
</div>