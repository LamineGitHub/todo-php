<?php

namespace App\Models;

use App\Database;

class Tasks
{
    protected \PDO $pdo;

    /**
     * Cette fonction est appelée lorsque la classe est instanciée et définit la propriété pdo sur l'objet
     * pdo renvoyé par la fonction getPdo() dans la classe Database.
     */
    public function __construct()
    {
        $this->pdo = Database::getPdo();
    }

    /**
     * Il obtient toutes les tâches de la base de données.
     *
     * @return object|array Un tableau de toutes les tâches de la base de données.
     */
    public function getAll(): object|array
    {
        $query = $this->pdo->query("SELECT * FROM tasks");

        $items = $query->fetchAll();
        $query->closeCursor();

        return $items;
    }

    /**
     * Il obtient une tâche de la base de données.
     *
     * @param int $id ID de la tâche à récupérer.
     *
     * @return object|bool Un tableau de la tâche correspondant à l'id.
     */
    public function getOne(int $id): object|bool
    {

        $query = $this->pdo->prepare("SELECT * FROM `tasks` WHERE id = :id");
        $query->execute(['id' => $id]);

        $item = $query->fetch();
        $query->closeCursor();

        return $item;
    }

    public function getActive(): bool|array
    {
        $query = $this->pdo->query("SELECT * FROM tasks WHERE status = 1");

        $items = $query->fetchAll();
        $query->closeCursor();

        return $items;
    }

    /**
     * Il obtient toutes les tâches de la base de données où le statut est 0
     *
     * @return object|array return un tableau d'objets.
     */
    public function getInactive(): object|array
    {
        $query = $this->pdo->query("SELECT * FROM tasks WHERE status = 0");

        $items = $query->fetchAll();
        $query->closeCursor();

        return $items;
    }

    /**
     * Il prend une chaîne (la tâche) comme argument et l'insère dans la base de données.
     *
     * @param string $content Le contenu de la tâche.
     */
    public function add(string $content): void
    {
        $query = $this->pdo->prepare("INSERT INTO `tasks` SET content = :content");
        $query->execute(compact("content"));
    }

    /**
     * Il supprime une tâche de la base de données
     *
     * @param int $id ID de la tâche à supprimer.
     */
    public function delete(int $id): void
    {
        $query = $this->pdo->prepare("DELETE FROM tasks WHERE id = :id");
        $query->execute(['id' => $id]);
    }

    /**
     * Il met à jour le statut d'une tâche dans la base de données.
     *
     * @param int $status 1 ou 0
     * @param int $id L'identifiant de la tâche
     */
    public function status(int $status, int $id): void
    {
        $query = $this->pdo->prepare("UPDATE `tasks` SET status = :status  WHERE id = :id");
        $query->bindValue(":status", $status, \PDO::PARAM_BOOL);
        $query->bindValue(":id", $id, \PDO::PARAM_INT);
        $query->execute();
    }
}
