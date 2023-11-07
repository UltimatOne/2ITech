<?php
$msg = "<div class='alert alert-danger' role='alert'>
    <p>Merci de compléter les champs suivants:";
        foreach ($_POST as $key => $value) {
        if (empty($value)) {
        $msg .= "<br> - $key";
        }
        $msg = $msg . "</p>
</div>";
};
?>