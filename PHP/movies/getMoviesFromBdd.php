<?php 

//récupère les films dans la tab movies de la bdd movies
try {
    $request = $db->prepare('SELECT * FROM movies');
    $request->execute([]);
    $movies = $request->fetchAll();

    // var_dump($movies);
} catch (Exception $e) {
    var_dump($e->getMessage());
}

?>