<?php
namespace App\Models;

use App\Database;

class Tasks
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = Database::getPdo();
    }

    public function gellAll()
    {
        $query = $this->pdo->prepare("SELECT * FROM tasks");
        $query->execute();
        $items = $query->fetchAll();

        return $items;
    }

    public function getOne(int $id)
    {

        $query = $this->pdo->prepare("SELECT * FROM `tasks` WHERE id = :id");
        $query->execute(['id' => $id]);

        $item = $query->fetch();

        return $item;
    }

    public function getActive()
    {
        $query = $this->pdo->prepare("SELECT * FROM tasks WHERE status = 1");
        $query->execute();
        $items = $query->fetchAll();

        return $items;
    }

    public function getInactive()
    {
        $query = $this->pdo->prepare("SELECT * FROM tasks WHERE status = 0");
        $query->execute();
        $items = $query->fetchAll();

        return $items;
    }

    public function add(string $content): void
    {
        $query = $this->pdo->prepare("INSERT INTO `tasks` SET content = :content");
        $query->execute(compact("content"));
    }

    public function delete(int $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM tasks WHERE status = :id");
        $query->execute(['id' => $id]);
    }
}
