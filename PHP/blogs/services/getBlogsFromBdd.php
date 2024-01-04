<?php

try {
    $request = $db->prepare('SELECT * FROM blogs');
    $request->execute([]);

    $blogs = $request->fetchAll();
} catch (Exception $e) {
    $msgError = "La liste de blogs n'a pas pu être récupérée";
    $boxButtonParam = "index.php";
    $altBoxButtonParam = "retour";
    $boxButtonDisplayValue = "Retour";
    // var_dump ($e->getMessage());
}
