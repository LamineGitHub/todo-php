<?php
namespace App;

class Http
{
    /**
     * Il redirige l'utilisateur vers l'URL spécifiée
     * 
     * @param string url L'URL vers laquelle rediriger.
     */
    public static function redirect(string $url): void
    {
        header("Location: $url");
        exit();
    }

}