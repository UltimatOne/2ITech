<?php
include 'components/header.php';

include('services/AddMyBlogIntoBdd.php');
include 'services/getMyBlogsFromBdd.php';

include 'components/box.php'
?>

<main class="blogs">
  <h2>Ajouter un blog</h2>
  <form class="" action="" method="post">
    <div class="">
      <label for="blog_title">Titre du blog</label>
      <input type="text" name="blog_title">
    </div>
    <div class="">
      <label for="blog-content">Contenu du blog</label>
      <textarea name="blog_content" cols="80" rows="10"></textarea>
    </div>
    <div>
      <select name="blog_state">
        <option value="">----------</option>
        <option value="Brouillon">Brouillon</option>
        <option value="Prêt">Prêt</option>
        <option value="Publié">Pubié</option>
      </select>
    </div>
    <button type="submit" class="">Ajouter le blog</button>
  </form>
  <h1>Mes Blogs</h1>
  <div>
    <?php foreach ($blogs as $key => $blog) {
      include 'components/myCard.php';
    } ?>
  </div>

</main>



<?php
include 'components/footer.php';
?>