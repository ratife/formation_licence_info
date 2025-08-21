<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire Étudiant</title>
    <link rel="stylesheet" href="/static/style/list.css<?php echo '?v=' . time(); ?>">
</head>
<body>
    <h2>Liste étudiants</h2>
    <a href="/create" class="btn">Créer un étudiant</a>
    <br>
    <input type="text" id="search" placeholder="Rechercher un étudiant...">
    <button id="searchBtn" class="btn" onclick="clickRecherche()">Rechercher</button>
    <script>
        
    </script>
    <br><br>
    
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
                echo '<td><a href="#" onclick="deleteEtudiant('.$row['id'].',\''. htmlspecialchars($row['nom']) .'\')" class="btn">Supprimer</a> <a  class="btn" href="/edit?id='.$row['id'].'">modifier</a></td>';
                echo "</tr>";
            }
            
        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        }
        ?>
        </tbody>
    </table>
    <a href="/list?page=<?php echo ($page - 1==0)?"1":$page-1  ?>" class="<?php echo ($page-1==0)?"btn-desactive":"btn" ?>"><</a>
    <a href="/list?page=<?php echo ($nbr_page == $page)?$nbr_page:$page+1 ?>"  class="<?php echo ($nbr_page == $page)?"btn-desactive":"btn" ?>">></a>
    <script src="/static/js/etudiant_for_php_page.js<?php echo '?v=' . time(); ?>"></script>
</body>
</html>
