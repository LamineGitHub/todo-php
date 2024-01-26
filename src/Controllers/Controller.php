<?php

namespace App\Controllers;

use App\Http;
use App\Models\Tasks as TasksModel;
use App\Renderer;
use Exception;


abstract class Controller
{
    protected TasksModel $model;

    protected string $controllerName;

    protected string $taskName;

    public function __construct()
    {
        $this->model = new TasksModel();
    }

    /**
     * Il récupère toutes les tâches de la base de données et affiche la vue.
     */
    public function index(): void
    {
        $tasks = $this->model->getAll();
        $pageTitle = "All Tasks";

        Renderer::render("all", compact("tasks", "pageTitle"));
    }

    /**
     * Il obtient les tâches actives du modèle,
     * puis affiche la vue active avec les tâches et le titre
     * de la page.
     */
    public function getActive(): void
    {
        $tasks = $this->model->getActive();
        $pageTitle = "Active task";

        Renderer::render("active", compact("tasks", "pageTitle"));
    }

    /**
     * Il obtient les tâches inactives du modèle,
     * puis affiche la vue inactive avec les tâches et le titre
     * de la page.
     */
    public function getInactive(): void
    {
        $tasks = $this->model->getInactive();
        $pageTitle = "Inactive Task";

        Renderer::render("inactive", compact("tasks", "pageTitle"));
    }

    /**
     * Il ajoute une nouvelle tâche à la base de données
     *  et renvoie la page encours.
     * @throws Exception
     */
    public function add(): void
    {
        $content = null;
        if (isset($_POST["content"]) && !empty($_POST["content"])) {
            $content = trim(htmlspecialchars($_POST["content"]));
        }

        if (!$content) {
            throw new \RuntimeException("Votre champs a été mal rempli !");
        }

        $this->model->add($content);

        // Http::redirect("index.php?controller=article&task=show&id=");
        Http::redirect("index.php?controller={$this->controllerName}&task={$this->taskName}");
    }

    /**
     * Il supprime une tâche de la base de données
     * et renvoie la page correspondant.
     * @throws Exception
     */
    public function delete(): void
    {
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            throw new \RuntimeException("Ho ?! Tu n'as pas précisé l'id !", 1);
        }

        $id = $_GET['id'];

        $task = $this->model->getOne($id);
        if (!$task) {
            throw new \RuntimeException("L'id $id n'existe pas, vous ne pouvez donc pas le supprimer !", 1);
        }

        $this->model->delete($id);

        Http::redirect("index.php?controller={$this->controllerName}&task={$this->taskName}");
    }

    /**
     * Il change le statut d'un élément dans la base de données
     *  et renvoie la page correspondante.
     * @throws Exception
     */
    public function status(): void
    {
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            throw new \RuntimeException("Ho ?! Tu n'as pas précisé l'id !", 1);
        }

        $id = $_GET['id'];

        $item = $this->model->getOne($id);
        if (!$item) {
            throw new \RuntimeException("L'id $id n'existe pas, vous ne pouvez donc pas le supprimer !", 1);
        }

        $status = $item->status === 0 ? 1 : 0;

        $this->model->status($status, $id);

        Http::redirect("index.php?controller={$this->controllerName}&task={$this->taskName}");
    }
}
