<?php
//Récupère le role de l'user connecté
$request = $db->prepare('SELECT `user_role` FROM users WHERE user_pseudo = ? AND user_email = ?');
$request->execute([
    $_SESSION["user"]['pseudo'],
    $_SESSION['user']['email']
]);

//fetch permet de récupérer une seule entrée, utilisé ici parceque la clef est unique (pseudo), pour une clé non unique on utilise fetchall
$role = $request->fetch();
?>