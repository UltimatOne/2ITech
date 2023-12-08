<?php
//Filtre et affiche les films
if (isset($_POST["movie_cat"]) && ($_POST["movie_cat"] != "")) {
    try {
        $request = $db->prepare('SELECT * FROM movies WHERE movies.movie_cat = ?');
        $request->execute([$_POST["movie_cat"]]);
        $movies = $request->fetchAll();

        // var_dump($movies);
    } catch (Exception $e) {
        var_dump($e->getMessage());
    }
} else {
    //récupère les films dans la tab movies de la bdd movies
    try {
        $request = $db->prepare('SELECT * FROM movies');
        $request->execute([]);
        $movies = $request->fetchAll();

        // var_dump($movies);
    } catch (Exception $e) {
        var_dump($e->getMessage());
    }
}
