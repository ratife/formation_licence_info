<?php

class EtudiantData {

    private $pdo;
    
    public function __construct() {
        $this->pdo = new PDO("mysql:host=mysql;dbname=testdb;charset=utf8", "root", "root");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getListEtudiant() {
        $stmt = $this->pdo->query("SELECT id,nom, prenom, age, email, sexe, filiere FROM etudiants");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getEtudiantById($id) {
        $stmt = $this->pdo->prepare("SELECT id, nom, prenom, age, email, sexe, filiere FROM etudiants WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteEtudiant($id) {
        $stmt = $this->pdo->prepare("DELETE FROM etudiants WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function create_etudiant($nom, $prenom, $age, $email, $sexe, $filiere) {
        // Préparation de la requête
        $sql = "INSERT INTO etudiants (nom, prenom, age, email, sexe, filiere,create_time)
                VALUES (:nom, :prenom, :age, :email, :sexe, :filiere,now())";
        
        $stmt = $this->pdo->prepare($sql);
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


    public function edit_etudiant_post($id,$nom,$prenom,$age,$email,$sexe,$filiere)
    {
        
        // Préparation de la requête
        $sql = "UPDATE etudiants 
                set nom = :nom, prenom = :prenom, age = :age, email = :email, sexe = :sexe, filiere = :filiere,update_time = now()
                WHERE id = :id
                ";
        
        $stmt = $this->pdo->prepare($sql);
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


    public function is_existe_email($email)
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM etudiants WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        return $stmt->fetchColumn() > 0;
    }
}

