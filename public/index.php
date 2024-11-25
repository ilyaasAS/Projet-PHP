<?php

use App\Core\Autoloader;
use App\Core\Router;

// Enregistrer l'autoloader
include_once '../src/Core/Autoloader.php';
Autoloader::register();

// Utiliser la classe Router
$router = new Router();
$router->execute();
