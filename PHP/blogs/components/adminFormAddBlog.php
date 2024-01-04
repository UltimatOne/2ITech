<?php
?>

<h2>Ajouter un blog</h2>
<form class="container w-50 bg-dark text-center mt-5 rounded-5 py-2 text-white fw-bold mb-2" action="" method="post">
  <div class="d-flex flex-column w-75 mx-auto">
    <label for="blog_title">Titre du blog</label>
    <input type="text" name="blog_title">
  </div>
  <div class="d-flex flex-column w-75 mx-auto">
    <label for="blog-content" class="form-label">Contenu du blog</label>
    <textarea name="blog_content" cols="80" rows="10"></textarea>
  </div>
  <div class="d-flex flex-column w-75 mx-auto">
    <label for="blog_user_pseudo">Pseudo du créateur du blog</label>
    <input type="text" name="blog_user_pseudo">
  </div>
  <button type="submit" class="btn btn-dark my-2">Ajouter le blog</button>
</form>