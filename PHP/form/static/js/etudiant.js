function deleteEtudiant(id,nom) {
    if (confirm("Êtes-vous sûr de vouloir supprimer l'étudiant "+nom+"  ?")) {
        fetch(`/form/controller/delete.php?id=${id}`, {
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