<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire Étudiant</title>
    <script src="/static/js/etudiant_for_js_page.js<?php echo '?v=' . time(); ?>"></script>
    <link rel="stylesheet" href="/static/style/list_js.css<?php echo '?v=' . time(); ?>">
</head>
<body onload="loadEtudiants()">
    
    <h2>Liste étudiants</h2>
    <a href="/create_js" class="btn">Créer un étudiant</a>
    <br>
    <input type="text" id="search" placeholder="Rechercher un étudiant...">
    <button id="searchBtn" class="btn" onclick="clickRecherche()">Rechercher</button>
    
    <br><br>
    
    <table class="styled-table" id="etudiantTable">
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
        <tbody></tbody>
    </table>
    <a  class="btn" onclick="prevPage()"><</a>
    <a   class="btn" onclick="nextPage()">></a>
    
</body>
</html>
