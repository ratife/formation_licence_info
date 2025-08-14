<?php

require_once 'data/etudiant_data.php';

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $email = htmlspecialchars($_GET["email"]);
    $is_exist = is_existe_email($email);
    echo json_encode(["status"=>"OK",'is_exist' => $is_exist]);
} else {
    echo json_encode(['status' => "KO", 'message' => "Aucune donnée reçue."]);
}
?>
