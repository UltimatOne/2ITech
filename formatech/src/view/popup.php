<?php if ($this->msgSuccess) { ?>
    <div class="boxAlert">
        <div class="boxAlertBody">
            <div class="w-25 mx-auto text-center mb-3">
                <p><?= $this->msgSuccess ?></p>
            </div>
            <a class="btn btn_dark" href='<?= $this->Param ?>' alt='<?= $this->altParam ?>'><?=  $this->displayValue ?></a>
        </div>
    </div>
<?php }

if ($this->msgError) { ?>
    <div class="boxAlert">
        <div class="boxAlertBody">
            <div class="mx-auto text-center mb-3">
                <p><?= $this->msgError ?></p>
            </div>
            <a class="btn btn-dark w-25" href='<?= $this->param ?>' alt='<?= $this->altParam ?>'><?=  $this->displayValue ?></a>
        </div>
    </div>
<?php } ?>