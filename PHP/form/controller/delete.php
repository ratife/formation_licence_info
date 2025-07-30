<?php
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    try {
        $pdo = new PDO("mysql:host=mysql;dbname=testdb;charset=utf8", "root", "root");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Préparation de la requête
        $sql = "DELETE FROM etudiants WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);

        // Exécution
        if ($stmt->execute()) {
            echo "<h2>Étudiant supprimé avec succès !</h2>";
        } else {
            echo "<h2>Erreur lors de la suppression de l'étudiant.</h2>";
        }
        echo "<a href='/form/view/index.php'>Voir la liste des étudiants</a>";
    } catch (PDOException $e) {
        echo "Erreur de connexion ou de suppression : " . $e->getMessage();
    }


    
    
} else {
    echo "Aucune donnée reçue.";
}
?>
