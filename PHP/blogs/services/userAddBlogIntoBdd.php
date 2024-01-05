<?php
//Valide l'ajout d'une énigme à la tab enigmes de la Bdd pandorasbox
if (!isset($_POST['modifBlog']) && isset($_POST['blog_title']) && isset($_POST['blog_content'])) {
    if (
        empty($_POST['blog_title']) ||
        empty($_POST['blog_content']) ||
        empty($_POST['blog_state']) 
    ) {
        $msgError = "<p>Merci de compléter les champs suivants:";
        foreach ($_POST as $key => $value) {
            if (empty($value)) {
                $msgError .= "<br> -> $key";
            }
        };
        $msgError .= "</p>";
        $boxButtonParam = "myBlogs.php";
        $altBoxButtonParam = "retour";
        $boxButtonDisplayValue = "Retour";
    } else {
        //Préparation des valeurs à envoyer
        $title = $_POST["blog_title"];
        $content = $_POST["blog_content"];
        $pseudo = $_SESSION['user']['pseudo'];
        $state = $_POST['blog_state'];

        try {
            //Bonne pratique permet de préparer l'envoi sans injection
            $request = $db->prepare("INSERT INTO blogs (blog_title, blog_content, blog_user_pseudo, blog_state) VALUES (?,?,?,?)");
            //Envoi
            $request->execute([$title, $content, $pseudo, $state]);

            $msgSuccess = "Le blog {$title} a bien été ajouté";
            $boxButtonParam = "myBlogs.php";
            $altBoxButtonParam = "retour";
            $boxButtonDisplayValue = "Retour";
        } catch (Exception $e) {
            $msgError = "L'ajout du blog a échoué";
            $boxButtonParam = "myBlogs.php";
            $altBoxButtonParam = "retour";
            $boxButtonDisplayValue = "Retour";
            var_dump($e->getMessage());
        };
    }
}
