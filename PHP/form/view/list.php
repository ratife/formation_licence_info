<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire Étudiant</title>
    <link rel="stylesheet" href="/form/view/style/style_list.css">
</head>
<body>
    <h2>Liste étudiants</h2>
    <a href="form.php">Créer un étudiant</a>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Âge</th>
                <th>Email</th>
                <th>Sexe</th>
                <th>Filière</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
        <?php
        try {
            if (!$list) {   
                echo "<tr><td colspan='7'>Aucun étudiant trouvé.</td></tr>";
            }
            foreach ($list as $row) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
                echo "<td>" . htmlspecialchars($row['prenom']) . "</td>";
                echo "<td>" . htmlspecialchars($row['age']) . "</td>";
                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                echo "<td>" . htmlspecialchars($row['sexe']) . "</td>";
                echo "<td>" . htmlspecialchars($row['filiere']) . "</td>";
                echo '<td><a href="/form/controller/delete.php?id='.$row['id'].'">Supprimer</a> <a href="/form/controller/edit.php?id='.$row['id'].'">modifier</a></td>';
                echo "</tr>";
            }
            
        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        }
        ?>
        </tbody>
    </table>
</body>
</html>
