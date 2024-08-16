<?php if (isset($_SESSION["user"]['role']) && $_SESSION["user"]['role'] === "super_admin") { ?>
        <div class="userLinks">
                <a href="index.php?page=listCenters">Centres</a>
                <a href="index.php?page=listSuperAdmins">Super admins</a>
                <a href="index.php?page=listAdmins">Admins</a>
        </div>
<?php } ?>