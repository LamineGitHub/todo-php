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
        $query->closeCursor();

        return $items;
    }

    public function getOne(int $id)
    {

        $query = $this->pdo->prepare("SELECT * FROM `tasks` WHERE id = :id");
        $query->execute(['id' => $id]);

        $item = $query->fetch();
        $query->closeCursor();

        return $item;
    }

    public function getActive()
    {
        $query = $this->pdo->prepare("SELECT * FROM tasks WHERE status = 1");
        $query->execute();

        $items = $query->fetchAll();
        $query->closeCursor();

        return $items;
    }

    public function getInactive()
    {
        $query = $this->pdo->prepare("SELECT * FROM tasks WHERE status = 0");
        $query->execute();

        $items = $query->fetchAll();
        $query->closeCursor();

        return $items;
    }

    public function add(string $content): void
    {
        $query = $this->pdo->prepare("INSERT INTO `tasks` SET content = :content");
        $query->execute(compact("content"));
    }

    public function delete(int $id)
    {
        $query = $this->pdo->prepare("DELETE FROM tasks WHERE id = :id");
        $query->execute(['id' => $id]);
    }

    public function status(int $staus, int $id)
    {
        $query = $this->pdo->prepare("UPDATE `tasks` SET status = :status  WHERE id = :id");
        $query->bindValue(":status", $staus, \PDO::PARAM_BOOL);
        $query->bindValue(":id", $id, \PDO::PARAM_INT);
        $query->execute();
    }
}
