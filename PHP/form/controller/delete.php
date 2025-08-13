<?php
require_once '../data/etudiant_data.php';
if ($_SERVER["REQUEST_METHOD"] === "DELETE" && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    try {
        
        if (deleteEtudiant($id)) {
            echo "<h2>Étudiant supprimé avec succès !</h2>";
        } else {
            echo "<h2>Erreur lors de la suppression de l'étudiant.</h2>";
        }
        echo "<a href='/form/controller/list.php'>Voir la liste des étudiants</a>";
    } catch (PDOException $e) {
        echo "Erreur de connexion ou de suppression : " . $e->getMessage();
    }


    
    
} else {
    echo "Aucune donnée reçue.";
}
?>
