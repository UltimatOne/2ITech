<div class="container w-50 col-sm border-end border-danger">
    <h3 class="text-danger"><?= $this->list_title ?></h3>
    <table id="listCentersTab" class="table mt-5">
        <thead>
            <tr>
                <th scope="col">Nom du centre</th>
                <th scope="col">Ville</th>
                <th scope="col">email</th>
                <th scope="col">Téléphone</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->centers as $key => $center) { ?>
                <tr class="align-middle">
                    <th class="" scope="row"><?= $center['name'] ?></th>
                    <td><?= $center['city_name'] ?></td>
                    <td><?= $center['email'] ?></td>
                    <td>0<?= $center['phone'] ?></td>
                    <td>
                        <a class="btn btn-dark" href="index.php?page=detailsCenters&id=<?= $center['id'] ?>" alt="liens vers les détails du centre">détails</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>