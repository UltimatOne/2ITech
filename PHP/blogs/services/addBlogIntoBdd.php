<?php
//Valide l'ajout d'une énigme à la tab enigmes de la Bdd pandorasbox
if (!isset($_POST['modifBlog']) && isset($_POST['blog_title']) && isset($_POST['blog_content'])) {
    if (
        empty($_POST['blog_title']) ||
        empty($_POST['blog_content']) ||
        empty($_POST['blog_user_pseudo'])
    ) {
        $msgError = "<p>Merci de compléter les champs suivants:";
        foreach ($_POST as $key => $value) {
            if (empty($value)) {
                $msgError .= "<br> -> $key";
            }
        };
        $msgError .= "</p>";
    } else {
        //Préparation des valeurs à envoyer
        $title = $_POST["blog_title"];
        $content = $_POST["blog_content"];
        $pseudo = $_POST['blog_user_pseudo'];

        try {
            //Bonne pratique permet de préparer l'envoi sans injection
            $request = $db->prepare("INSERT INTO blogs (blog_title, blog_content, blog_user_pseudo) VALUES (?,?,?)");
            //Envoi
            $request->execute([$title, $content, $pseudo]);

            $msgSuccess = "Le blog {$title} a bien été ajouté";
            $boxButtonParam = "add.php";
            $altBoxButtonParam = "retour";
            $boxButtonDisplayValue = "Retour";
        } catch (Exception $e) {
            $msgError = "L'ajout du blog a échoué";
            $boxButtonParam = "add.php";
            $altBoxButtonParam = "retour";
            $boxButtonDisplayValue = "Retour";
        };
    }
}
