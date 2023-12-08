<?php

//récupère l'id du film et le supprime dans la tab movies de la bdd movies
if (isset($_GET["del"])) {
    $movieId = $_GET["del"];
    try {
        
        $request = $db->prepare("DELETE FROM movies WHERE `movies`.`movie_id` = ?");
        $request->execute([$movieId]);
        $msgSuccess = "Le film a bien été supprimé";

    } catch (Exception $e) {
        var_dump($e->getMessage());
    }
};

?>
