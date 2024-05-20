<?php if (isset($_SESSION["user"]['role']) && $_SESSION["user"]['role'] === "super_admin") { ?>
    <li class="p-2">
        <a class="" href="index.php?page=listCenters">Centres</a>
    </li>
    <li class="p-2">
        <a class="" href="index.php?page=listSuperAdmins">Super admins</a>
    </li>
    <li class="p-2">
        <a class="" href="index.php?page=listAdmins">Admins</a>
    </li>
<?php } ?>