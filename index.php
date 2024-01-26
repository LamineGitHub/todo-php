<?php
require_once 'vendor/autoload.php';

use App\Application;

/**
 * Appel de la méthode `process` de la classe `Application'.
 * Qui fait le reste du boulot
 *
 * S'il y a une erreur, capturer l'erreur qui pourrait être levée par l'application
 * et l'afficher dans le fichier view/error.html.php.
 */

try {
    Application::process();
} catch (\Exception $e) {
    $errorMessage = $e->getMessage();

    require 'view/error.html.php';
}
