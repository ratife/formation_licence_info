<?php
// Définition des routes : URL => Contrôleur + Méthode
return [
    '/' => ['file'=> 'etudiant_controller.php','controller' => 'EtudiantController', 'action' => 'list'],
    '/list' => ['file'=> 'etudiant_controller.php','controller' => 'EtudiantController', 'action' => 'list'],
    '/list_json' => ['file'=> 'etudiant_controller.php','controller' => 'EtudiantController', 'action' => 'list_json'],
    '/list_js' => ['file'=> 'etudiant_controller.php','controller' => 'EtudiantController', 'action' => 'list_js'],
    '/index' => ['file'=> 'etudiant_controller.php','controller' => 'EtudiantController', 'action' => 'list'],
    '/create' => ['file'=> 'etudiant_controller.php','controller' => 'EtudiantController', 'action' =>   'create'],
    '/create_js' => ['file'=> 'etudiant_controller.php','controller' => 'EtudiantController', 'action' =>   'create_js'],
    
    '/check_mail' => ['file'=> 'etudiant_controller.php','controller' => 'EtudiantController', 'action' => 'checkEmail'],
    '/delete' => ['file'=> 'etudiant_controller.php','controller' => 'EtudiantController', 'action' => 'delete'],
    '/edit' => ['file'=> 'etudiant_controller.php','controller' => 'EtudiantController', 'action' => 'edit'],
    '/edit_js' => ['file'=> 'etudiant_controller.php','controller' => 'EtudiantController', 'action' => 'edit_js'],
    /*
    '/list' => ['controller' => 'etudiant.php'],
    '/delete' => ['controller' => 'etudiant.php'],
    '/edit' => ['controller' => 'etudiant.php'],
    '/create' => ['controller' => 'etudiant.php'],
    '/check_mail' => ['controller' => 'etudiant.php']*/
];
