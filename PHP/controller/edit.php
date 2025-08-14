<?php
require_once 'data/etudiant_data.php';
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id'])) { 
        
        $etudiant = getEtudiantById($_GET['id']);
        if (!$etudiant) {
            echo "<h2>Aucun étudiant trouvé avec cet ID.</h2>";
            exit;
        }
        include 'view/form.php';
    }

else if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
    
    $id = intval($_POST['id']);
    $nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $age = intval($_POST["age"]);
    $email = htmlspecialchars($_POST["email"]);
    $sexe = htmlspecialchars($_POST["sexe"]);
    $filiere = htmlspecialchars($_POST["filiere"]);
    try {
        edit_etudiant_post($id,$nom,$prenom,$age,$email,$sexe,$filiere);
        echo "<h2>Le mis a jour a réussie !</h2>";
        echo "<a href='/'>Voir la liste des étudiants</a>";
    
    } catch (PDOException $e) {
        echo "Erreur de connexion ou de suppression : " . $e->getMessage();
    }
    
} 

else {
    echo "Aucune donnée reçue.";
}
?>
