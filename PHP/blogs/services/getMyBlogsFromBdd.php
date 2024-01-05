<?php

try {
    $request = $db->prepare('SELECT * FROM `blogs` WHERE blog_user_pseudo = ? ORDER BY blog_create_date DESC');
    $request->execute([
        $_SESSION['user']['pseudo']
    ]);

    $blogs = $request->fetchAll();
} catch (Exception $e) {
    $msgError = "La liste de blogs n'a pas pu être récupérée";
    $boxButtonParam = "index.php";
    $altBoxButtonParam = "retour";
    $boxButtonDisplayValue = "Retour";
    // var_dump ($e->getMessage());
}