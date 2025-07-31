<?php
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    try {
        $pdo = new PDO("mysql:host=mysql;dbname=testdb;charset=utf8", "root", "root");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->query("SELECT id,nom, prenom, age, email, sexe, filiere FROM etudiants WHERE id = $id");
        // Vérification si l'étudiant existe
        $etudiant = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$etudiant) {
            echo "<h2>Aucun étudiant trouvé avec cet ID.</h2>";
            exit;
        }
        include '../view/form.php';
    } catch (PDOException $e) {
        echo "Erreur de connexion ou de suppression : " . $e->getMessage();
    }
    
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
       $pdo = new PDO("mysql:host=mysql;dbname=testdb;charset=utf8", "root", "root");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Préparation de la requête
        $sql = "UPDATE etudiants 
                set nom = :nom, prenom = :prenom, age = :age, email = :email, sexe = :sexe, filiere = :filiere,update_time = now()
                WHERE id = :id
                ";
        
        $stmt = $pdo->prepare($sql);
        // Liaison des paramètres
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':sexe', $sexe);
        $stmt->bindParam(':filiere', $filiere);
        $stmt->bindParam(':id', $id);

        // Exécution
        $stmt->execute();

        echo "<h2>Le mis a jour a réussie !</h2>";
        echo "<a href='/form/view/index.php'>Voir la liste des étudiants</a>";
    } catch (PDOException $e) {
        echo "Erreur de connexion ou de suppression : " . $e->getMessage();
    }
    
} 

else {
    echo "Aucune donnée reçue.";
}
?>
