<?php
//Infos de connection à la BDD
include 'bddPass.php';

//connection à la BDD
try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $pswrd);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    var_dump($e->getMessage());
}
;

?>