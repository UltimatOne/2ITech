<?php

$class = "success";
$msg = $msgSuccess;

if (!empty($msgError)) {

    $class = "danger";
    $msg = $msgError;
}

?>

<div class="alert alert-<?= $class ?>" role="alert">
    <?= $msg ?>
</div>

