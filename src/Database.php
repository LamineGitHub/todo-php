<?php

namespace App;

use PDO;

class Database
{
    private static PDO|null $instance = null;

    /**
     * Fonction qui permet de se connecter à la base de données.
     * Il renvoie un objet PDO connecté à la base de données.
     *
     * @return PDO Un objet PDO.
     */
    public static function getPdo(): PDO
    {
        if (self::$instance === null) {
            self::$instance = new PDO('mysql:host=localhost;dbname=todolist;charset=utf8', 'root', '', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            ]);
        }

        return self::$instance;
    }
}
