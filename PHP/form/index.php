<?php
// Charger toutes les routes
$routes = require __DIR__ . '/router.php';

// Récupérer l'URL demandée (sans paramètres GET)
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
//var_dump($requestUri); // Pour débogage, à supprimer en production
//die;
// Trouver la route correspondante
if (isset($routes[$requestUri])) {
    $controllerName = $routes[$requestUri]['controller'];
    //$actionName = $routes[$requestUri]['action'];

    include 'controller/'.$controllerName;
    // Inclure le fichier du contrôleur
    //require __DIR__ . '/controller/' . $controllerName . '.php';

    // Instancier et appeler la méthode
    // $controller = new $controllerName();
    // $controller->$actionName();
} else {
    // Route non trouvée
    http_response_code(404);
    echo "404 - Page non trouvée";
}
