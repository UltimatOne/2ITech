<?php
include 'components/header.php';
include 'services/getBlogsFromBdd.php';

?>

 <main class="">
<h1 style="text-align:center; margin:20px">Liste des Blogs</h1>

<h3 style="text-align:center; margin: 20px ">Filtrer</h3>
<!-- <div style="margin: 20px auto; width : 60%; display:flex; justify-content: space-around;">

  <a type="button" class="btn btn-success" href="list.php?filtre=easy" style="width: 18%">Facile</a>
  <a type="button" class="btn btn-primary" href="list.php?filtre=medium" style="width: 18%">Moyenne</a>
  <a type="button" class="btn btn-warning text-white " href="list.php?filtre=hard" style="width: 18%">Difficile</a>
  <a type="button" class="btn btn-danger" href="list.php?filtre=impossible" style="width: 18%">Père Fourras</a>
  <a type="button" class="btn btn-secondary" href="list.php">Toutes les difficultés</a>
</div> -->
<div class='d-flex justify-content-evenly'>

  <div class="d-flex flex-column flex-wrap" style="width: 23%;">
    <?php foreach ($blogs as $key => $blog) {

      // if (
      //   (isset($_GET["filtre"]) && $_GET["filtre"] === $enigme["enigme_difficulty"]) ||
      //   !isset($_GET["filtre"])
      // ) {
      //   if ($enigme["enigme_difficulty"] === 'easy') {
          include 'components/card.php';
      //   }
      // }
    } ?>
  </div>

</div>
</main>