<?php

namespace App;

class Renderer
{
    /**
     * Il prend un chemin vers une view et un tableau de variables, 
     * et rend la page correspondante avec les variables
     * 
     * @param string $path Chemin d'accès au fichier de modèle, relatif au répertoire de modèles.
     * @param array $variables un tableau de variables à utiliser dans le modèle
     */
    public static function render(string $path, array $variables = []): void
    {
        extract($variables);
        ob_start();
        require('view/tasks/' . $path . '.html.php');
        $pageContent = ob_get_clean();

        require('view/layout.html.php');
    }
}
