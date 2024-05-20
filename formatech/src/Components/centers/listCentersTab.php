<div class="flex flex-col w-50 border-r-red-1 p-2">
    <h3 class="text-red"><?= $this->list_title ?></h3>
    <table id="listCentersTab" class="mt-5 gap-4 p-2 text-2">
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
                        <a class="block btn btn-dark w-full mt-1" href="index.php?page=detailsCenters&id=<?= $center['id'] ?>" alt="liens vers les détails du centre">détails</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>