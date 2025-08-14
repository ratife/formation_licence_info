function deleteEtudiant(id,nom) {
    if (confirm("Êtes-vous sûr de vouloir supprimer l'étudiant "+nom+"  ?")) {
        fetch(`/delete?id=${id}`, {
            method: 'DELETE'
        })
        .then(response => {
            if (response.ok) {
                alert("Étudiant supprimé avec succès.");
                window.location.reload();
            } else {
                alert("Erreur lors de la suppression de l'étudiant.");
            }
        })
        .catch(error => console.error('Erreur:', error));
    }
}

function etudiantCreated(id, nom, prenom, age, sexe, email, filiere)
{
    if (confirm("Vérifier informations de l'étudiant: "+nom+" "+prenom+" "+", "+age+ " ans"+" "+sexe+" "+" "+email+ " "+filiere))
    {
        fetch(`/post?id=${id}`, {
            method: 'POST'
        })
        .then(response => {
            if (response.ok) {
                alert("Étudiant créé avec succès.");
                window.location.reload();
            }  else {
                alert("Erreur lors de la création de l'étudiant.");
            }
        })
        .catch(error => console.error('Erreur:', error));
    }
}
