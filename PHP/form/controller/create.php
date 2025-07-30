<?php
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
        $pdo = new PDO("mysql:host=mysql;dbname=testdb;charset=utf8", "root", "root");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Préparation de la requête
        $sql = "INSERT INTO etudiants (nom, prenom, age, email, sexe, filiere,create_time)
                VALUES (:nom, :prenom, :age, :email, :sexe, :filiere,now())";
        
        $stmt = $pdo->prepare($sql);
        // Liaison des paramètres
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':sexe', $sexe);
        $stmt->bindParam(':filiere', $filiere);

        // Exécution
        $stmt->execute();

        echo "<h2>Inscription réussie !</h2>";
        echo "<a href='/form/view/index.php'>Voir la liste des étudiants</a>";
    } catch (PDOException $e) {
        echo "Erreur de connexion ou d'insertion : " . $e->getMessage();
    }
    
} else {
    echo "Aucune donnée reçue.";
}
?>
