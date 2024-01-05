<?php

$class = "green";
$msg = $msgSuccess;
$Param = $boxButtonParam;
$altParam = $altBoxButtonParam;
$displayValue = $boxButtonDisplayValue;

if (!empty($msgError)) {
  $class = "red";
  $msg = $msgError;
}

?>
<?php
if (!empty($msg)) {
?>
  <div class='boxAlert'>
    <div class='boxAlertBody'>
      <div class="boutonsListe bouton_<?= $class ?>">
        <?= $msg ?>
      </div>
      <a class="bontonsListe bouton_dark" href='<?= $Param ?>' alt='<?= $altParam ?>'><?=  $displayValue ?></a>
    </div>
  </div>
<?php } ?>