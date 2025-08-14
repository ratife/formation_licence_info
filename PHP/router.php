<?php
// Définition des routes : URL => Contrôleur + Méthode
return [
    '/' => ['controller' => 'list.php'],
    '/delete' => ['controller' => 'delete.php'],
    '/edit' => ['controller' => 'edit.php'],
    '/create' => ['controller' => 'create.php'],
    '/check_mail' => ['controller' => 'check_mail.php']
];
