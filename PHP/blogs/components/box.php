<?php

$class = "success";
$msg = $msgSuccess;
$Param = $boxButtonParam;
$altParam = $altBoxButtonParam;
$displayValue = $boxButtonDisplayValue;

if (!empty($msgError)) {
  $class = "danger";
  $msg = $msgError;
}

?>
<?php
if (!empty($msg)) {
?>
  <div class='bg-dark bg-opacity-50 d-flex justify-content-center align-items-center' style='position: absolute; z-index: 10; top: 0; bottom: 0; left: 0; right: 0;'>
    <div class='d-flex flex-column align-items-center w-25 bg-white p-4 border border-2 border-black rounded-5  '>
      <div class="alert alert-<?= $class ?>" role="alert">
        <?= $msg ?>
      </div>
      <a class='btn btn-dark' href='<?= $Param ?>' alt='<?= $altParam ?>'><?=  $displayValue ?></a>
    </div>
  </div>
<?php } ?>