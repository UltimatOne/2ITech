<?php if (isset($_SESSION["user"]['role']) && $_SESSION["user"]['role'] === "student") { ?>
    <li class="p-2">
        <a class="" href="index.php?page=#">student</a>
    </li>
    <li class="p-2">
        <a class="" href="index.php?page=#">#</a>
    </li>
    <li class="p-2">
        <a class="" href="index.php?page=#">#</a>
    </li>
<?php } ?>