 <?php
 function saveFile(){
    $file = $_FILES['photo'] ?? null;
    if ($file && $file['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $file_name = $file_name = time(). ".". $extension;
        $filePath = $uploadDir . $file_name;
        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            // Le fichier a été téléchargé avec succès
            // Tu peux enregistrer le chemin du fichier dans la base de données si nécessaire
        } else {
            echo "Erreur lors du téléchargement du fichier.";
        }
        return $file_name;
    }
 }

 