<?php if (isset($_SESSION["user"]['role']) && $_SESSION["user"]['role'] === "admin") { ?>
    <li class="p-2">
        <a class="" href="index.php?page=#">admin</a>
    </li>
    <li class="p-2">
        <a class="" href="index.php?page=#">#</a>
    </li>
    <li class="p-2">
        <a class="" href="index.php?page=#">#</a>
    </li>
<?php } ?>