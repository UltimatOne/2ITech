<?php
$class = "success";
$msg = $msgSuccess;

if (!empty($msgError)) {
  $class = "danger";
  $msg = $msgError;
}
?>
<?php if (!empty($msg)) { ?>
<div class="alert alert-<?= $class ?>" role="alert">
  <?= $msg ?>
</div>
<?php } ?>