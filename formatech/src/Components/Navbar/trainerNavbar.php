<?php if (isset($_SESSION["user"]['role']) && $_SESSION["user"]['role'] === "trainer") { ?>
    <li class="p-2">
        <a class="" href="index.php?page=#">trainer</a>
    </li>
    <li class="p-2">
        <a class="" href="index.php?page=#">#</a>
    </li>
    <li class="p-2">
        <a class="" href="index.php?page=#">#</a>
    </li>
<?php } ?>