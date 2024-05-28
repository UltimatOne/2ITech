<h1 class="text-red"><?= $this->title ?></h1>

<form class="" action="" method="post">
    <div>
        <label for="title" class="">Titre</label>
        <input type="text" class="" name="title" id="title">
    </div>
    <div>
        <label for="description" class="">Description</label>
        <textarea class="" name="description" id="description"></textarea>
    </div>
    <div>
        <label for="priority" class="">Priorité</label>
        <select name="priority" id="priority">
            <option value="">----------</option>
            <?php foreach ($this->priorities as $priority) { ?>
                <option value="<?= $priority['priority_id'] ?>" id="<?= $priority['priority_id'] ?>"><?= $priority['priority_name'] ?></option>
            <?php }; ?>
        </select>
    </div>
    <div>
        <label for="deadline" class="">Echéance</label>
        <input type="date" class="" name="deadline" id="deadline"></input>
    </div>
    <button type="submit" class="mt-10">Envoyer</button>
</form>