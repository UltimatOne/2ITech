<?php if (isset($_SESSION["user"]['role']) && $_SESSION["user"]['role'] === "student") { ?>
    <li class="nav-item">
        <a class="nav-link" href="index.php?page=#">student</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="index.php?page=#">#</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="index.php?page=#">#</a>
    </li>
<?php } ?>