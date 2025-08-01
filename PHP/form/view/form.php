<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire Étudiant</title>
    <link rel="stylesheet" href="/form/view/style/style.css">
</head>
<body>
    <h2>Informations de l'Étudiant</h2>
    <form action="/form/controller/<?php echo isset($etudiant)?'edit':'create'?>.php " method="post">
        <input type="hidden" name="id" value="<?php  echo isset($etudiant)?$etudiant['id']:'' ?>">

        <label>Nom:</label><br>
        <input type="text" name="nom" required value="<?php  echo isset($etudiant)?$etudiant['nom']:'' ?>"><br><br>

        <label>Prénom :</label><br>
        <input type="text" name="prenom" required value="<?php  echo isset($etudiant)?$etudiant['prenom']:'' ?>"><br><br>

        <label>Âge :</label><br>
        <input type="number" name="age" min="0" required value="<?php  echo isset($etudiant)?$etudiant['age']:'' ?>"><br><br>

        <label>Email :</label><br>
        <input type="email" name="email" required value="<?php  echo isset($etudiant)?$etudiant['email']:'' ?>"><br><br>

        <label>Sexe :</label><br>
        <input type="radio" name="sexe" value="Homme" <?php echo isset($etudiant) && $etudiant['sexe']=='Homme'?'checked':'' ?> > Homme
        <input type="radio" name="sexe" value="Femme" <?php echo isset($etudiant) && $etudiant['sexe']=='Femme'?'checked':'' ?>> Femme<br><br>

        <label>Filière :</label><br>
        <select name="filiere" required>
            <option value="Informatique" <?php echo isset($etudiant) && $etudiant['filiere']=='Informatique'?'selected':'' ?> >Informatique</option>
            <option value="Mathématiques" <?php echo isset($etudiant) && $etudiant['filiere']=='Mathématiques'?'selected':'' ?>>Mathématiques</option>
            <option value="Physique" <?php echo isset($etudiant) && $etudiant['filiere']=='Physique'?'selected':'' ?>>Physique</option>
        </select><br><br>

        <input type="submit" value="Enregistrer">
    </form>
</body>
</html>
