<?php

//Valide la modification d'un blog à la tab blogs de la Bdd blogs
if (isset($_POST['modifBlog']) && isset($_POST['blog_title']) && isset($_POST['blog_content'])) {
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
        $boxButtonParam = "add.php";
        $altBoxButtonParam = "retour";
        $boxButtonDisplayValue = "Retour";
    } else {
        //Préparation des valeurs à envoyer
        $id = $_POST["blog_id"];
        $title = $_POST["blog_title"];
        $content = $_POST["blog_content"];
        $pseudo = $_POST["blog_user_pseudo"];

        try {
            //Bonne pratique permet de préparer l'envoi sans injection
            $request = $db->prepare("UPDATE blogs SET blog_title = ?, blog_content = ?, blog_user_pseudo = ? WHERE blog_id = ?");
            //Envoi
            $request->execute([$title, $content, $pseudo, $id]);

            $msgSuccess = "Le blog {$title} a bien été modifiée";
            $boxButtonParam = "add.php";
            $altBoxButtonParam = "retour";
            $boxButtonDisplayValue = "Retour";
        } catch (Exception $e) {
            $msgError = "La modification du blog a échoué";
            $boxButtonParam = "add.php";
            $altBoxButtonParam = "retour";
            $boxButtonDisplayValue = "Retour";
        };
    }
}
