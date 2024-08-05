<div class="centersList">
    <h3 class="text-red"><?= $this->list_title ?></h3>
    <div class="container">
        <?php foreach ($this->centers as $key => $center) { ?>
            <div id="listCentersCard" class="card">
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
                <a class="block btn btn-dark w-full mt-1" href="index.php?page=detailsCenters&id=<?= $center['id'] ?>" alt="liens vers les détails du centre">détails</a>
            </div>
        <?php } ?>
        <table id="listCentersTab" class="tab">
            <thead>
                <tr class="h-16">
                    <th scope="">Nom du centre</th>
                    <th scope="">Ville</th>
                    <th scope="">email</th>
                    <th scope="">Téléphone</th>
                    <th scope=""></th>
                </tr>
            </thead>
            <tbody class="overflow-auto">
                <?php foreach ($this->centers as $key => $center) { ?>
                    <tr class="text-center mt-5 h-20">
                        <th><?= $center['name'] ?></th>
                        <td><?= $center['city_name'] ?></td>
                        <td><?= $center['email'] ?></td>
                        <td>0<?= $center['phone'] ?></td>
                        <td class="flex">
                            <a class="block btn btn-dark w-full mt-1" href="index.php?page=detailsCenter&id=<?= $center['id'] ?>" alt="liens vers les détails du centre">détails</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>