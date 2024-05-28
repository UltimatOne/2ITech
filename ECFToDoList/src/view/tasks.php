<h1 class="text-red"><?= $this->title ?></h1>
<div class="tasksListDesktop">
    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Date d'ajout</th>
                <th>Date d'échéance</th>
                <th>Priorité</th>
                <th>Statut</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->tasks as $key => $task) { ?>
                <tr id="task-<?= $task["task_id"] ?>">
                    <th><?= $task['task_title'] ?></th>
                    <td><?= $task['task_creation_date'] ?></td>
                    <td><?= $task['task_deadline'] ?></td>
                    <td><?= $task['priority_name'] ?></td>
                    <td><?= $task['status_name'] ?></td>
                    <td class="flex">
                        <button class="taskDetailsButton" id="<?= $task['task_id'] ?>">détails</button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<div class="tasksListMobile">
    <?php foreach ($this->tasks as $key => $task) { ?>
        <div class="taskCard">
            <h3><?= $task['task_title'] ?></h3>
            <div>
                <p>Date d'ajout : <?= $task['task_creation_date'] ?></p>
                <p>Date d'échéance : <?= $task['task_deadline'] ?></p>
                <p>Statut : <?= $task['status_name'] ?></p>
                <p>Priorité : <?= $task['priority_name'] ?></p>
            </div>
            <button class="taskDetailsButton" id="<?= $task['task_id'] ?>">détails</button>
        </div>
    <?php } ?>
</div>
<?php foreach ($this->tasks as $key => $task) { ?>
    <section id="taskDetails-<?= $task['task_id'] ?>" class="taskDetails hidden">
        <article>
            <button id="closeDetails-<?= $task['task_id'] ?>" class="closeDetails">X</button>
            <h3><?= $task['task_title'] ?></h3>
            <div>
                <p>Date d'ajout : <?= $task['task_creation_date'] ?></p>
                <p>Date d'échéance : <?= $task['task_deadline'] ?></p>
                <p id="priorityDisplay-task-<?= $task['task_id'] . '-priority-' . $task['priority_id'] ?>" class="priorityDisplay">Priorité : <?= $task['priority_name'] ?></p>
                <p id="priorityChange-task-<?= $task['task_id'] . '-priority-' . $task['priority_id'] ?>" class="priorityChange hidden">Priorité : 
                    <select id="priority-task-<?= $task['task_id'] . '-priority-' . $task['priority_id'] ?>" name="priority">
                        <?php foreach ($this->priorities as $priority) { ?>
                            <option value="<?= $priority['priority_id'] ?>" id="<?= $priority['priority_id'] ?>"><?= $priority['priority_name'] ?></option>
                        <?php }; ?>
                    </select>
                </p>
                <p id="statusDisplay-task-<?= $task['task_id'] . '-status-' . $task['status_id'] ?>" class="statusDisplay">Statut : <?= $task['status_name'] ?></p>
                <p id="statusChange-task-<?= $task['task_id'] . '-status-' . $task['status_id'] ?>" class="statusChange hidden">Statut : 
                    <select id="status-task-<?= $task['task_id'] . '-status-' . $task['status_id'] ?>" name="status" class="status">
                        <?php foreach ($this->status as $status) { ?>
                            <option value="<?= $task['task_id'] . '-' . $status['status_id'] ?>" id="<?= $status['status_id'] ?>"><?= $status['status_name'] ?></option>
                        <?php }; ?>
                    </select>
                </p>
                <h5>Description</h5>
                <p><?= $task['task_description'] ?></p>
                <h5>Commentaires</h5>
                <p><?= $task['task_comments'] ?></p>
            </div>
            <aside>
                <button id="deleteButton-<?= $task["task_id"] ?>" class="deleteButton">Supprimer</button>
                <button id="commentsButton-task-<?= $task["task_id"] ?>" class="commentsButton">Commentaire</button>
                <button id="priorityButton-task-<?= $task["task_id"] . '-priority-' . $task['priority_id'] ?>" class="priorityButton">Priorité</button>
                <button id="statusButton-task-<?= $task["task_id"] . '-status-' . $task['status_id'] ?>" class="statusButton">Statut</button>
            </aside>
        </article>
    </section>
<?php } ?>