<?php

if (isset($_GET['suppBlog']) && !empty($_GET['suppBlog'])) {
    $request = $db->prepare('DELETE FROM blogs WHERE blog_id = ?');
    $request->execute([
        $_GET['suppBlog']
    ]);
    $msgSuccess = "Le blog a bien été supprimée";
    $boxButtonParam = "add.php";
    $altBoxButtonParam = "retour";
    $boxButtonDisplayValue = "Terminer";
}
