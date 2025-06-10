<?php if (isset($_SESSION["user"]['role']) && $_SESSION["user"]['role'] === "student") { ?>
        <div class="userLinks">
                <a href="index.php?page=#">student</a>
                <?php if (isset($_SESSION["user"]["inscription_id"])) { ?>
                        <a href="index.php?page=chat">Chat</a>
                <?php } ?>
                <a href="index.php?page=#">#</a>
        </div>
<?php } ?>