<?php
include 'header.php';
//Pour vider $_SESSION en cas de bug
if (isset($_GET["logout"]) &&
    $_GET["logout"] == "true") {
        $_SESSION = [];
        session_destroy();
        header('index.php');
        exit();
    };

?>

<main>
    <h1 class="text-center">Hello World!!!</h1>
</main>

<?php
include 'footer.php';
?>