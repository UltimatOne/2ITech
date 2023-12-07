<?php 
    //récupère les catégories dans la tab cat de la bdd movies
    try {
        $request = $db->prepare('SELECT * FROM cat');
        $request->execute([]);
        $categories = $request->fetchAll();
    
        // var_dump($categorie);
    } catch (Exception $e) {
        var_dump($e->getMessage());
    }
?>