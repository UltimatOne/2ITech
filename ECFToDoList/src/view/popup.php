<?php 

if ($this->msg) { ?>
    <div class="boxAlert">
        <div class="boxAlertBody">
            <div>
                <p><?= $this->msg ?></p>
            </div>
            <a href='<?= $this->param ?>' alt='<?= $this->altParam ?>'><?=  $this->displayValue ?></a>
        </div>
    </div>
<?php }