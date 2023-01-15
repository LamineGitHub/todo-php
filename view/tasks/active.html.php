<?php foreach ($tasks as $task) { ?>
    <li class="todo list-group-item d-flex align-items-center">
        <input class="form-check-input" type="checkbox" id="todo" <?= $task->status === 1 ? "checked" : null ?> />
        <label class="ms-2 form-check-label" for="todo">
            <?= $task->content ?>
        </label>
        <label class="ms-auto btn btn-danger btn-sm">
            <a href="" onclick=confirme()>
                <i class="bi-trash text-white"></i>
            </a>
        </label>
    </li>

<?php } ?>