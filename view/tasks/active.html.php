<?php $controllerActive = "controller=Active&task=" ?>

<div class="btn-group mb-4" id="group" role="group">
    <a href="./" type="button" class="btn btn-outline-primary">Toutes</a>
    <a href="index.php?task=getInactive" type="button" class="btn btn-outline-primary">A faire</a>
    <a href="index.php?task=getActive" type="button" class="btn btn-outline-primary active">Faites</a>
</div>

<ul class="list-group">
    <?php foreach ($tasks as $task) { ?>

        <li class="todo list-group-item d-flex align-items-center">

            <a href="index.php?<?= $controllerActive ?>status&id=<?= $task->id ?>">
                <input class="form-check-input" type="checkbox" <?= $task->status === 1 ? "checked" : null ?>>
                <label class="ms-2 form-check-label" id="content">
                    <?= $task->content ?>
                </label>
            </a>

            <label class="ms-auto btn btn-danger btn-sm">
                <a href="index.php?<?= $controllerActive ?>delete&id=<?= $task->id ?>" onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cette tâche ?!`)">
                    <img src=" style/poubelle.svg" alt="">
                </a>
            </label>

        </li>

    <?php } ?>
</ul>