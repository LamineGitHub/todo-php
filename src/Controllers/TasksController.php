<?php
namespace App\Controllers;

use App\Http;
use App\Models\Tasks as TasksModel;
use App\Renderer;


class TasksController
{
    protected $model;
    public function __construct()
    {
        $this->model = new TasksModel();
    }

    public function index()
    {
        $tasks = $this->model->gellAll();
        $pageTitle = "Accueil";

        Renderer::render("all", compact("tasks", "pageTitle"));
    }

    public function getActive()
    {
        $tasks = $this->model->getActive();
        $pageTitle = "Active";

        Renderer::render("active", compact("tasks", "pageTitle"));
    }

    public function getInactive()
    {
        $tasks = $this->model->getInactive();
        $pageTitle = "inactive";

        Renderer::render("inactive", compact("tasks", "pageTitle"));
    }

    public function add()
    {
        $content = null;
        if (!empty($_POST['content'])) {
            $content = trim(htmlspecialchars($_POST['content']));
            // dd($content);
        }

        if (!$content) {
            die("Votre champs a été mal rempli !");
        }

        $this->model->add($content);

        // Http::redirect("index.php?controller=article&task=show&id=");
        Http::redirect("index.php");
    }

    public function delete()
    {
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die("Ho ?! Tu n'as pas précisé l'id !");
        }

        $id = $_GET['id'];

        $task = $this->model->getOne($id);
        if (!$task) {
            die("L'id $id n'existe pas, vous ne pouvez donc pas le supprimer !");
        }

        $this->model->delete($id);

        Http::redirect("index.php");
    }
}
