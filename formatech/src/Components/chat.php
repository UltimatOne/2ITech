<section id="chat">
    <h1>Bienvenue au chat <?= $this->studentFirstname ?></h1>
    <section id="chat-container">
        <div class="rooms">
            <h4>Liste des salons</h4>
            <div>
                <p><?= $this->room["room_name"] ?></p>
            </div>
        </div>
        <div class="chat">
            <h3 id="<?= $this->room["room_id"] ?>" class="card-title"><?= $this->room["room_name"] ?></h3>
            <p><?= $this->room["room_description"] ?></p>
            <ul id="messagesList">
                <?php 
                    for ($i = 0; $i < count($this->messages); $i++) {
                        if ($_SESSION["user"]["id"] == $this->messages[$i]["student_id"]) { 
                ?>
                            <li class="right">
                                <label><?= $this->messages[$i]["student_firstname"] ?></label>
                                <p><?= $this->messages[$i]["message"] ?></p>
                            </li>
                    <?php } else { ?>
                            <li class="left">
                                <label><?= $this->messages[$i]["student_firstname"] ?></label>
                                <p><?= $this->messages[$i]["message"] ?></p>
                            </li>
                <?php }} ?>
            </ul>
            <form id="messageForm" method="post">
                <input id="messageInput" type="text" autocomplete="off" placeholder="Votre message" />
                <button type="submit" class="btn">Envoyer</button>
            </form>
        </div>
    </section>
</section>