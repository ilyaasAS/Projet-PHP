<?php

namespace App\Core;

use App\Controller\Front\HomeController;

class Router
{
    private array $routes = []; // Assurez-vous d'initialiser le tableau des routes
    private $currentController;

    public function __construct()
    {
        // Ajoute les routes
        $this->addRoutes('/', function() {
            $this->currentController = new HomeController();
            $this->currentController->show(); 
        });

        $this->addRoutes('/contact', function() {
            // Ajouter ici la logique pour la page de contact si nécessaire
        });
    }

    private function addRoutes(string $route, callable $closure)
    {
        $this->routes[$route] = $closure;
    }

    public function execute() // Corrigé l'orthographe ici
    {
        // Récupérer l'URI de la requête
        $requestUri = $_SERVER['REQUEST_URI'];
        $requestUri = str_replace('/projet-PHP', '', $requestUri);

        // Parcourir les routes définies
        foreach ($this->routes as $key => $closure) {
            if ($requestUri === $key) {
                $closure(); // Appeler la closure associée à la route
                return; // Sortir de la méthode
            }
        }

        // Si aucune route ne correspond, afficher une erreur 404
        include_once '../templates/error404.php';
    }
}
