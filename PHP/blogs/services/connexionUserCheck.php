<?php
//Verifier si le role existe et est administrateur
if (!isset($role) || $role['user_role'] !== 'administrator') {
    header('Location: signIn.php');
    exit();
}

?>