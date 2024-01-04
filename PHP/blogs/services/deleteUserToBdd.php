<?php

if (isset($_GET['suppUser']) && !empty($_GET['suppUser'])) {
    $request = $db->prepare('DELETE FROM users WHERE user_id = ?');
    $request->execute([
        $_GET['suppUser']
    ]);
    $msgSuccess = "L'utilisateur a bien été supprimé";
    $boxButtonParam = "add.php";
    $altBoxButtonParam = "retour";
    $boxButtonDisplayValue = "Terminer";
}
