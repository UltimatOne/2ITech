<?php if (isset($_SESSION["user"]['role']) && $_SESSION["user"]['role'] === "admin") { ?>
        <div class="userLinks">
                <a href="index.php?page=#">admin</a>
                <a href="index.php?page=#">#</a>
                <a href="index.php?page=#">#</a>
        </div>
<?php } ?>