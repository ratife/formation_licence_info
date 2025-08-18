<?php
// Définition des routes : URL => Contrôleur + Méthode
return [
    '/' => ['file'=> 'etudiant_controller.php','controller' => 'EtudiantController', 'action' => 'list'],
    '/list' => ['file'=> 'etudiant_controller.php','controller' => 'EtudiantController', 'action' => 'list'],
    '/index' => ['file'=> 'etudiant_controller.php','controller' => 'EtudiantController', 'action' => 'list'],
    '/create' => ['file'=> 'etudiant_controller.php','controller' => 'EtudiantController', 'action' =>   'create'],
    
    '/check_mail' => ['file'=> 'etudiant_controller.php','controller' => 'EtudiantController', 'action' => 'checkEmail'],
    '/delete' => ['file'=> 'etudiant_controller.php','controller' => 'EtudiantController', 'action' => 'delete'],
    '/edit' => ['file'=> 'etudiant_controller.php','controller' => 'EtudiantController', 'action' => 'edit'],
    

    /*
    '/list' => ['controller' => 'etudiant.php'],
    '/delete' => ['controller' => 'etudiant.php'],
    '/edit' => ['controller' => 'etudiant.php'],
    '/create' => ['controller' => 'etudiant.php'],
    '/check_mail' => ['controller' => 'etudiant.php']*/
];
