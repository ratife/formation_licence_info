<?php

class EtudiantData {

    private $pdo;
    
    public function __construct() {
        $this->pdo = new PDO("mysql:host=mysql;dbname=testdb;charset=utf8", "root", "root");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getCountEtudiant($search = '') {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM etudiants WHERE lower(nom) LIKE lower(:search) OR lower(prenom) LIKE lower(:search)");
        $search = '%' . $search . '%';
        $stmt->bindParam(':search', $search);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    /*
        $stmt = $this->pdo->query("SELECT COUNT(*) FROM etudiants WHERE nom LIKE ':search' OR prenom LIKE ':search' ");
        $stmt->bindParam(':search', $search);
        $stmt->execute();
        return $stmt->fetchColumn();
    }*/

    public function getListEtudiant($page = 1,$search = '', $limit = 5) {
        $offset = ($page - 1) * $limit;
        $stmt = $this->pdo->prepare("SELECT id, nom, prenom, age, email, sexe, filiere FROM etudiants WHERE lower(nom) LIKE lower(:search) OR lower(prenom) LIKE lower(:search) LIMIT :offset, :limit");
        $search = '%' . $search . '%';
        $stmt->bindParam(':search', $search);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
      

    public function getEtudiantById($id) {
        $stmt = $this->pdo->prepare("SELECT id, nom, prenom, age, email, sexe, filiere,photo FROM etudiants WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteEtudiant($id) {
        $stmt = $this->pdo->prepare("DELETE FROM etudiants WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function create_etudiant($nom, $prenom, $age, $email, $sexe, $filiere,$file_name) {
        // Préparation de la requête
        $sql = "INSERT INTO etudiants (nom, prenom, age, email, sexe, filiere,photo,create_time)
                VALUES (:nom, :prenom, :age, :email, :sexe, :filiere,now())";
        
        $stmt = $this->pdo->prepare($sql);
        // Liaison des paramètres
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':sexe', $sexe);
        $stmt->bindParam(':filiere', $filiere);
        $stmt->bindParam(':file_name', $file_name);

        // Exécution
        return $stmt->execute();
    }


    public function edit_etudiant_post($id,$nom,$prenom,$age,$email,$sexe,$filiere,$file_name)
    {
        
        // Préparation de la requête
        $sql = "UPDATE etudiants 
                set nom = :nom, prenom = :prenom, age = :age, email = :email, sexe = :sexe, filiere = :filiere,photo=:file_name,update_time = now()
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
        $stmt->bindParam(':file_name', $file_name);


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

