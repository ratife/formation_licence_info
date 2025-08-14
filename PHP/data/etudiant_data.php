<?php

function getListEtudiant() {
        $pdo = new PDO("mysql:host=mysql;dbname=testdb;charset=utf8", "root", "root");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->query("SELECT id,nom, prenom, age, email, sexe, filiere FROM etudiants");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getEtudiantById($id) {
    $pdo = new PDO("mysql:host=mysql;dbname=testdb;charset=utf8", "root", "root");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("SELECT id, nom, prenom, age, email, sexe, filiere FROM etudiants WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function deleteEtudiant($id) {
    $pdo = new PDO("mysql:host=mysql;dbname=testdb;charset=utf8", "root", "root");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("DELETE FROM etudiants WHERE id = :id");
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}

function create_etudiant($nom, $prenom, $age, $email, $sexe, $filiere) {
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
       return $stmt->execute();
}


function edit_etudiant_post($id,$nom,$prenom,$age,$email,$sexe,$filiere)
{
    
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
        return $stmt->execute();

}


function is_existe_email($email)
{
    $pdo = new PDO("mysql:host=mysql;dbname=testdb;charset=utf8", "root", "root");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM etudiants WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    
    return $stmt->fetchColumn() > 0;
}
