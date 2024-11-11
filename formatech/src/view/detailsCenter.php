<?php if (isset($this->center) && !empty($this->center)) { ?>
    <section class="detailsCenter">
        <h1><?= $this->title . " " . $this->center["center_name"] ?></h1>
        <article>
            <div>
                <form id="form_center_picture" action="" method="post">
                    <div>
                        <img src="<?= !isset($this->center['center_picture']) ? 'https://placehold.co/600x400' : '' ?>" alt="Building of <?= $this->center['center_name'] ?>">
                        <button id="mod_center_picture_button" class="btn btn-dark ">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </button>
                    </div>
                    <input type="file" id="mod_center_picture" name="center_picture" value="" class="hidden" accept=".jpg,.jpeg,.wbep,.bmp,.png">
                    <button id="mod_center_picture_submit" class="btn btn-dark hidden" type="submit">envoyer</button>
                </form>
            </div>
            <div>
                <table>
                    <tbody>
                        <tr>
                            <form action="" method="post">
                                <th><label for="mod_center_name">Nom du centre :</label></th>
                                <td>
                                    <p id="mod_center_name_displayed"><?= $this->center['center_name'] ?></p>
                                    <input id="mod_center_name" name="mod_center_name" type="text" class="hidden" value="<?= $this->center['center_name'] ?>">
                                </td>
                                <td>
                                    <button id="mod_center_name_submit" class="btn btn-dark hidden" type="submit">envoyer</button>
                                </td>
                                <td>
                                    <button id="mod_center_name_button" class="btn btn-dark ">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>
                                </td>
                            </form>
                        </tr>
                    </tbody>
                    <tr>
                        <form action="" method="post">
                            <th><label for="mod_center_admin">Administrateur :</label></th>
                            <td>
                                <p id="mod_center_admin_displayed"><?= $this->center['center_admin_id'] ? $this->center['center_admin_id'] : 'Non renseigné' ?></p>
                                <select id="mod_center_admin" name="mod_center_admin" type="text" class="hidden">
                                    <?php if (!$this->center['center_admin_id']) { ?>
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
                            </td>
                            <td>
                                <button id="mod_center_admin_submit" class="btn btn-dark hidden" type="submit">envoyer</button>
                            </td>
                            <td>
                                <button id="mod_center_admin_button" class="btn btn-dark ">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                            </td>
                        </form>
                    </tr>
                    <tr>
                        <form action="" method="post">
                            <th><label for="mod_center_email">Email :</label></th>
                            <td>
                                <p id="mod_center_email_displayed"><?= $this->center['center_email'] ?></p>
                                <input type="text" id="mod_center_email" class="hidden" name="mod_center_email" value="<?= $this->center['center_email'] ?>">
                            </td>
                            <td>
                                <button id="mod_center_email_submit" class="btn btn-dark hidden" type="submit">envoyer</button>
                            </td>
                            <td>
                                <button id="mod_center_email_button" class="btn btn-dark ">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                            </td>
                        </form>
                    </tr>
                    <tr>
                        <form action="" method="post">
                            <th><label for="mod_center_phone">Téléphone :</label></th>
                            <td>
                                <p id="mod_center_phone_displayed">0<?= $this->center['center_phone'] ?></p>
                                <input type="text" id="mod_center_phone" class="hidden" name="mod_center_phone" value="<?= $this->center['center_phone'] ?>">
                            </td>
                            <td>
                                <button id="mod_center_phone_submit" class="btn btn-dark hidden" type="submit">envoyer</button>
                            </td>
                            <td>
                                <button id="mod_center_phone_button" class="btn btn-dark ">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>
                            </td>
                        </form>
                    </tr>
                </table>
            </div>
        </article>
        <div>
            <a class="btn btn-dark" href="index.php?page=listCenter" alt="retour à la liste des centres">
                Retour
            </a>
        </div>
        <a class="btn btn-danger" href="index.php?page=deleteCenter&id=<?= $center['center_id'] ?>" alt="supprimer le centre">
            <i class="fa-solid fa-trash"></i>
        </a>
    </section>
<?php } else { ?>
    <h1><?= $this->title ?></h1>

<?php } ?>