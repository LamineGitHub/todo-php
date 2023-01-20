<?php

namespace App;

class Application
{
    /**
     * Il vérifie si le contrôleur et la tâche sont valides, sinon, il lève une exception. 
     * S'ils sont valides, il crée une nouvelle instance du contrôleur 
     * et appelle la tâche correspondant.
     */
    public static function process(): void
    {
        $controllerName = "All";
        $controllerAccept = ["All", "Active", "Inactive"];

        $taskName = "index";
        $taskAccept = [
            "index",
            "getActive",
            "getInactive",
            "add",
            "delete",
            "status"
        ];

        /* Vérifier si le contrôleur et la tâche et id sont valides. Sinon, il lève une exception. */

        if (isset($_GET["controller"]) && !empty($_GET["controller"])) {
            $controllerName = ucfirst($_GET["controller"]);
        }
        if (isset($_GET["task"]) && !empty($_GET["task"])) {
            $taskName = $_GET["task"];
        }


        if (
            !in_array($taskName, $taskAccept, true) ||
            !in_array($controllerName, $controllerAccept, true)
        ) {
            throw new \Exception("404 , Page not found", 404);
        }

        $controllerName = "App\Controllers\\$controllerName";

        $controller = new $controllerName;
        $controller->$taskName();
    }
}
