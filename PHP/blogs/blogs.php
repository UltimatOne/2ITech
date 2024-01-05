<?php
include 'components/header.php';
include 'services/getBlogsFromBdd.php';

?>

<main class="blogs">
  <h1>Liste des Blogs</h1>
    <div>
      <?php foreach ($blogs as $key => $blog) {
        include 'components/card.php';
      } ?>
    </div>

</main>

<?php
include 'components/footer.php';
?>