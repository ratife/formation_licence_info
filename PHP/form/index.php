<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire Étudiant</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Informations de l'Étudiant</h2>
    <form action="traitement.php" method="post">
        <label>Nom:</label><br>
        <input type="text" name="nom" required><br><br>

        <label>Prénom :</label><br>
        <input type="text" name="prenom" required><br><br>

        <label>Âge :</label><br>
        <input type="number" name="age" min="0" required><br><br>

        <label>Email :</label><br>
        <input type="email" name="email" required><br><br>

        <label>Sexe :</label><br>
        <input type="radio" name="sexe" value="Homme" required> Homme
        <input type="radio" name="sexe" value="Femme"> Femme<br><br>

        <label>Filière :</label><br>
        <select name="filiere" required>
            <option value="Informatique">Informatique</option>
            <option value="Mathématiques">Mathématiques</option>
            <option value="Physique">Physique</option>
        </select><br><br>

        <input type="submit" value="Envoyer">
    </form>
</body>
</html>
