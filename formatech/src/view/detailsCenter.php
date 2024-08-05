<?php if (isset($this->center) && !empty($this->center)) { ?>
    <h1><?= $this->center["center_name"] ?></h1>
    <h1><?= $this->center["center_city_id"] ?></h1>
<?php } else { ?>
    <h1><?= $this->title ?></h1>
<?php } ?>
