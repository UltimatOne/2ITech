<?php
include 'header.php';

if (isset($_GET['logout']) and $_GET['logout'] == "true") {

    $_SESSION = [];
    session_destroy();
    header('location: index.php');
    exit();
}

if (isset($_GET['login']) and $_GET['login'] === 'true') {
    $login = $_GET['login'];
}

?>
<h1>Home</h1>

<?php
include 'box.php';
include 'footer.php';
?>



