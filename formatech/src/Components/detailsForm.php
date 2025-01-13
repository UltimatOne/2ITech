<?php if (isset($this->center) && !empty($this->center)) { ?>
    <section id="details" class="details">
        <h1><?= $this->title . " " . $this->center["center_name"] ?></h1>
        <article>
            <div>
                <form action="" method="post">
                    <div class="picture-container">
                        <img src="<?= !isset($this->center['center_picture']) ? 'https://placehold.co/600x400' : $this->center['center_picture'] ?>" alt="Building of <?= $this->center['center_name'] ?>">
                        <button id="change_picture_btn" class="btn btn-dark"><i class="fa-regular fa-pen-to-square"></i></button>
                    </div>
                    <div class="input_picture_reserved">
                        <div id="input_picture" class="picture-input-container hidden">
                            <input type="file" name="center_picture" value="" accept=".jpg,.jpeg,.wbep,.bmp,.png">
                            <input type="hidden" name="center_id" value="<?= $this->center["center_id"] ?>">
                            <button id="cancel_change_picture_btn" class="btn btn-danger btn-change"><i class="fa-solid fa-xmark"></i></button>
                            <button class="btn btn-dark btn-change" type="submit"><i class="fa-regular fa-paper-plane"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div>
                <table>
                    <tbody>
                        <tr>
                            <form action="" method="post">
                                <th><label for="center_name">Nom du centre :</label></th>
                                <td class="containerInput">
                                    <p id="name"><?= $this->center['center_name'] ?></p>
                                    <input id="input_name" name="center_name" type="text" class="hidden" value="<?= $this->center['center_name'] ?>">
                                    <input type="hidden" name="center_id" value="<?= $this->center["center_id"] ?>">
                                </td>
                                <td class="btns-container">
                                    <button id="cancel_change_name_btn" class="btn btn-danger btn-change hidden"><i class="fa-solid fa-xmark"></i></button>
                                    <button id="submit_name_btn" class="btn btn-dark btn-change hidden" type="submit"><i class="fa-regular fa-paper-plane"></i></button>
                                    <button id="change_name_btn" class="btn btn-dark btn-change"><i class="fa-regular fa-pen-to-square"></i></button>
                                </td>
                            </form>
                        </tr>
                    </tbody>
                    <tr>
                        <form action="" method="post">
                            <th><label for="center_admin">Administrateur :</label></th>
                            <td class="containerInput">
                                <p id="admin"><?= $this->center['center_admin_id'] ? $this->center['center_admin_id'] : 'Non renseigné' ?></p>
                                <div id="input_admin" class="custom-select custom-select-details hidden">
                                    <select name="center_admin" type="text">
                                        <?php if (empty($this->center['center_admin_id'])) { ?>
                                            <option value="" selected>--------------</option>
                                            <?php foreach ($this->admins as $admin) { ?>
                                                <option value="<?= $admin['id'] ?>"><?= $admin['firstname'] . " " . $admin['name'] ?></option>
                                            <?php }
                                        } else { ?>
                                            <option value="">--------------</option>
                                            <?php foreach ($this->admins as $admin) {
                                                if ($this->center['center_admin_id'] === $admin['id']) { ?>
                                                    <option value="<?= $admin['id'] ?>" selected><?= $admin['firstname'] . " " . $admin['name'] ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $admin['id'] ?>"><?= $admin['firstname'] . " " . $admin['name'] ?></option>
                                        <?php }
                                            }
                                        } ?>
                                    </select>
                                    <input type="hidden" name="center_id" value="<?= $this->center["center_id"] ?>">
                                </div>
                            </td>
                            <td class="btns-container">
                                <button id="cancel_change_admin_btn" class="btn btn-danger btn-change hidden"><i class="fa-solid fa-xmark"></i></button>
                                <button id="submit_admin_btn" class="btn btn-dark btn-change hidden" type="submit"><i class="fa-regular fa-paper-plane"></i></button>
                                <button id="change_admin_btn" class="btn btn-dark btn-change"><i class="fa-regular fa-pen-to-square"></i>
                                </button>
                            </td>
                        </form>
                    </tr>
                    <tr>
                        <form action="" method="post">
                            <th><label for="center_email">Email :</label></th>
                            <td class="containerInput">
                                <p id="email"><?= $this->center['center_email'] ?></p>
                                <input type="text" id="input_email" class="hidden" name="center_email" value="<?= $this->center['center_email'] ?>">
                                <input type="hidden" name="center_id" value="<?= $this->center["center_id"] ?>">
                            </td>
                            <td class="btns-container">
                                <button id="cancel_change_email_btn" class="btn btn-danger btn-change hidden"><i class="fa-solid fa-xmark"></i></button>
                                <button id="submit_email_btn" class="btn btn-dark btn-change hidden" type="submit"><i class="fa-regular fa-paper-plane"></i></button>
                                <button id="change_email_btn" class="btn btn-dark btn-change"><i class="fa-regular fa-pen-to-square"></i></button>
                            </td>
                        </form>
                    </tr>
                    <tr>
                        <form action="" method="post">
                            <th><label for="mod_center_phone">Téléphone :</label></th>
                            <td class="containerInput">
                                <p id="phone">0<?= $this->center['center_phone'] ?></p>
                                <input type="text" id="input_phone" class="hidden" name="mod_center_phone" value="<?= $this->center['center_phone'] ?>">
                                <input type="hidden" name="center_id" value="<?= $this->center["center_id"] ?>">
                            </td>
                            <td class="btns-container">
                                <button id="cancel_change_phone_btn" class="btn btn-danger btn-change hidden"><i class="fa-solid fa-xmark"></i></button>
                                <button id="submit_phone_btn" class="btn btn-dark btn-change hidden" type="submit"><i class="fa-regular fa-paper-plane"></i></button>
                                <button id="change_phone_btn" class="btn btn-dark btn-change"><i class="fa-regular fa-pen-to-square"></i></button>
                            </td>
                        </form>
                    </tr>
                    <tr>
                        <form action="" method="post">
                            <th class="address-details"><label for="address">Adresse :</label></th>
                            <td class="containerInput">
                                <div id="address">
                                    <p><?= $this->center["center_address"] ?></p>
                                    <p><?= $this->center["center_additional_address"] ?></p>
                                    <p><?= $this->center["city_zip_code"] . ", " . $this->center["city_name"] ?></p>
                                    <p id="country_displayed" value="<?= $this->center["country_id"] ?>"><?= $this->center["country_name"] ?></p>
                                </div>
                                <div id="input_address" class="hidden">
                                    <div class="containerInput custom-select">
                                        <label for="country">Pays <span>*</span></label>
                                        <select id="country" name="country">

                                        </select>
                                    </div>
                                    <div class="containerAddress">

                                    </div>
                                </div>
                                <input type="hidden" name="center_id" value="<?= $this->center["center_id"] ?>">
                            </td>
                            <td class="btns-container">
                                <button id="cancel_change_address_btn" class="btn btn-danger btn-change hidden"><i class="fa-solid fa-xmark"></i></button>
                                <button id="submit_address_btn" class="btn btn-dark btn-change hidden" type="submit"><i class="fa-regular fa-paper-plane"></i></button>
                                <button id="change_address_btn" class="btn btn-dark btn-change"><i class="fa-regular fa-pen-to-square"></i></button>
                            </td>
                        </form>
                    </tr>
                </table>
            </div>
        </article>
        <div>
            <a class="btn btn-dark btn-back" href="index.php?page=listCenters" alt="retour à la liste des centres">Retour</a>
        </div>
        <button id="delete_btn" class="btn btn-danger btn-change btn-delete"><i class="fa-solid fa-trash"></i></button>
    </section>
<?php } else { ?>
    <h1><?= $this->title ?></h1>

<?php } ?>