<?php if (isset($_SESSION["user"]['role']) && $_SESSION["user"]['role'] === "student") { ?>
        <div class="userLinks">
                <a href="index.php?page=#">student</a>
                <a href="index.php?page=#">#</a>
                <a href="index.php?page=#">#</a>
        </div>
<?php } ?>