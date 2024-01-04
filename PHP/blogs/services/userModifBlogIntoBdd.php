<?php

//Valide la modification d'un blog à la tab blogs de la Bdd blogs
if (isset($_POST['modifBlog']) && isset($_POST['blog_title']) && isset($_POST['blog_content'])) {
    var_dump($_POST);
    if (
        empty($_POST['blog_title']) ||
        empty($_POST['blog_content'])
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
        $id = $_POST["blog_id"];
        $title = $_POST["blog_title"];
        $content = $_POST["blog_content"];

        try {
            //Bonne pratique permet de préparer l'envoi sans injection
            $request = $db->prepare("UPDATE blogs SET blog_title = ?, blog_content = ? WHERE blog_id = ?");
            //Envoi
            $request->execute([$title, $content, $id]);

            $msgSuccess = "Le blog {$title} a bien été modifiée";
            $boxButtonParam = "blogDetails.php?id=" . $blogId . "";
            $altBoxButtonParam = "retour au blog";
            $boxButtonDisplayValue = "Retour";
        } catch (Exception $e) {
            $msgError = "La modification du blog a échoué";
            $boxButtonParam = "blogDetails.php?id=" . $blogId . "";
            $altBoxButtonParam = "retour au blog";
            $boxButtonDisplayValue = "Retour";
        };
    }
}
