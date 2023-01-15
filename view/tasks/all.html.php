<?php foreach ($tasks as $task) { ?>
    <li class="todo list-group-item d-flex align-items-center">

        <a href="">
            <input class="form-check-input" type="checkbox" <?= $task->status === 1 ? "checked" : null ?> />
        </a>
        <label class="ms-2 form-check-label">
            <?= $task->content ?>
        </label>
        <label class="ms-auto btn btn-danger btn-sm">
            <a href="" onclick=confirme()>
                <i class="bi-trash text-white"></i>
            </a>
        </label>
    </li>

<?php } ?>