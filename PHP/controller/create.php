<?php

require_once 'data/etudiant_data.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $age = intval($_POST["age"]);
    $email = htmlspecialchars($_POST["email"]);
    $sexe = htmlspecialchars($_POST["sexe"]);
    $filiere = htmlspecialchars($_POST["filiere"]);

    echo "<h2>Données reçues :</h2>";
    echo "Nom : $nom<br>";
    echo "Prénom : $prenom<br>";
    echo "Âge : $age<br>";
    echo "Email : $email<br>";
    echo "Sexe : $sexe<br>";
    echo "Filière : $filiere<br>";

    try {
        create_etudiant($nom, $prenom, $age, $email, $sexe, $filiere);

        echo "<h2>Inscription réussie !</h2>";
        echo "<a href='/'>Voir la liste des étudiants</a>";
    } catch (PDOException $e) {
        echo "Erreur de connexion ou d'insertion : " . $e->getMessage();
    }
}
else if ($_SERVER["REQUEST_METHOD"] === "GET") {
    
  include 'view/form.php';

    
} else {
    echo "Aucune donnée reçue.";
}
?>
