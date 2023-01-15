<?php
namespace App;

use App\Controllers\TasksController;

class Application
{
    public static function process()
    {
        // $controllerName = "TasksController";
        $task = "index";

        // if (isset($_GET["controller"]) && !empty($_GET["controller"])) {
        //     $controllerName = ucfirst($_GET["controller"]);
        // }
        if (isset($_GET["task"]) && !empty($_GET["task"])) {
            $task = ucfirst($_GET["task"]);
        }

        // $controllerName = "App\Controllers\\$controllerName";

        $controller = new TasksController;
        $controller->$task();
    }
}
