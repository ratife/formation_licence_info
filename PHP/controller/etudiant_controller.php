<?php
class EtudiantController {

    private $etudiantData;

    public function __construct() {
        require_once 'data/etudiant_data.php';
        $this->etudiantData = new EtudiantData();
    }


    public function list() {
        try {
            $list  = $this->etudiantData->getListEtudiant();
            echo json_encode($list);
            require_once 'view/etudiant/list.php';
        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        }
    }  

    public function checkEmail() {
        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            $email = $_GET["email"] ?? null;

            if (!$email) {
                echo json_encode(['status' => "KO", 'message' => "Paramètre 'email' manquant."]);
                return;
            }

            $email = htmlspecialchars($email);

            // Si la fonction is_existe_email est globale
            // $is_exist = is_existe_email($email);

            // Si tu veux passer par l'objet EtudiantData
            $is_exist = $this->etudiantData->is_existe_email($email);

            echo json_encode([
                "status" => "OK",
                'is_exist' => $is_exist
            ]);
        } else {
            echo json_encode([
                'status' => "KO",
                'message' => "Méthode non autorisée. Utiliser GET."
            ]);
        }
    }

     

    public function delete() {
        if ($_SERVER["REQUEST_METHOD"] === "DELETE" && isset($_GET['id'])) {
            $id = intval($_GET['id']);
            try {
                if ($this->etudiantData->deleteEtudiant($id)) {
                    echo "<h2>Étudiant supprimé avec succès !</h2>";
                } else {
                    echo "<h2>Erreur lors de la suppression de l'étudiant.</h2>";
                }
                echo "<a href='/'>Voir la liste des étudiants</a>";
            } catch (PDOException $e) {
                echo "Erreur de connexion ou de suppression : " . $e->getMessage();
            }

        } else {
            echo "Aucune donnée reçue.";
        }
    }

    public function edit() {
        if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id'])) { 
        
            $etudiant = $this->etudiantData->getEtudiantById($_GET['id']);
            if (!$etudiant) {
                echo "<h2>Aucun étudiant trouvé avec cet ID.</h2>";
                exit;
            }
            include 'view/etudiant/form.php';
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
                $this->etudiantData->edit_etudiant_post($id,$nom,$prenom,$age,$email,$sexe,$filiere);
                echo "<h2>Le mis a jour a réussie !</h2>";
                echo "<a href='/'>Voir la liste des étudiants</a>";
            
            } catch (PDOException $e) {
                echo "Erreur de connexion ou de suppression : " . $e->getMessage();
            }
            
        } 

        else {
            echo "Aucune donnée reçue.";
        }
    }

    public function create() {
        
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            
            $nom = htmlspecialchars($_POST["nom"]);
            $prenom = htmlspecialchars($_POST["prenom"]);
            $age = intval($_POST["age"]);
            $email = htmlspecialchars($_POST["email"]);
            $sexe = htmlspecialchars($_POST["sexe"]);
            $filiere = htmlspecialchars($_POST["filiere"]);

            try {
                $this->etudiantData->create_etudiant($nom, $prenom, $age, $email, $sexe, $filiere);
                echo json_encode(["status"=>"OK", "message" => "Inscription réussie !"]);
                //echo "<h2>Inscription réussie !</h2>";
                //echo "<a href='/'>Voir la liste des étudiants</a>";
            } catch (PDOException $e) {
                echo "Erreur de connexion ou d'insertion : " . $e->getMessage();
            }
        }
        else if ($_SERVER["REQUEST_METHOD"] === "GET") {
             include 'view/etudiant/form.php';
        } else {
            echo "Aucune donnée reçue.";
        }
    }
}
