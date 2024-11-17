<div class="centersList">
    <h3><?= $this->list_title ?></h3>
    <div class="container">
        <?php foreach ($this->centers as $key => $center) { ?>
            <div class="card">
                <h3><?= $center["name"] ?></h3>
                <ul>Ville :
                    <li>
                        <?= $center['city_name'] ?>
                    </li>
                </ul>
                <ul>email :
                    <li>
                        <?= $center['email'] ?>
                    </li>
                </ul>
                <ul>Téléphone :
                    <li>
                        0<?= $center['phone'] ?>
                    </li>
                </ul>
                <a class="btn btn-dark" href="index.php?page=detailsCenter&id=<?= $center['id'] ?>" alt="liens vers les détails du centre"><i class="fa-regular fa-eye"></i></a>
            </div>
        <?php } ?>
        <div id="addCenterButton" class="card">
            <p>+</p>
        </div>
        <table id="listCentersTab" class="tab">
            <thead>
                <tr>
                    <th>Nom du centre</th>
                    <th>Ville</th>
                    <th>email</th>
                    <th>Téléphone</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->centers as $key => $center) { ?>
                    <tr class="text-center mt-5 h-20">
                        <th><?= $center['name'] ?></th>
                        <td><?= $center['city_name'] ?></td>
                        <td><?= $center['email'] ?></td>
                        <td>0<?= $center['phone'] ?></td>
                        <td class="flex">
                            <a class="btn btn-dark" href="index.php?page=detailsCenter&id=<?= $center['id'] ?>" alt="liens vers les détails du centre">
                                <i class="fa-regular fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>