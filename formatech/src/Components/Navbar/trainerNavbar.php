<?php if (isset($_SESSION["user"]['role']) && $_SESSION["user"]['role'] === "trainer") { ?>
    <li class="nav-item">
        <a class="nav-link" href="index.php?page=#">trainer</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="index.php?page=#">#</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="index.php?page=#">#</a>
    </li>
<?php } ?>