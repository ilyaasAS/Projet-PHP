<?php

namespace App\Core;

class Autoloader
{
    public static function register(): void
    {
        spl_autoload_register(function ($className) {

            // Convertir les namespaces en chemin de fichier
            $path = str_replace('App', 'src', $className); // Remplacer le namespace de base par 'src'
            
            $path = str_replace('\\', DIRECTORY_SEPARATOR, $path); // Remplacer les backslashes par des slashes
            
            include_once '..' . DIRECTORY_SEPARATOR . "$path.php";
            

        });
    }
}
