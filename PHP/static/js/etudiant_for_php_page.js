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

function saveEtudiant(id)
{
    if(id === 0) {
        const email = document.getElementsByName("email")[0].value;
        fetch(`/check_mail?email=${email}`, {
                method: 'GET'
            })
            .then(response => {
                if (response.ok) {
                    response.json().then(data => {
                        if (data.is_exist) {
                            alert("L'email existe déjà. Veuillez en choisir un autre.");
                        } 
                        else {
                            //document.querySelector('form').submit();
                            const form = document.querySelector('form');
                            const formData = new FormData(form);
                            
                            fetch('/create', {
                                method: 'POST',
                                body: formData
                            })
                            .then(response => {
                                if (response.ok) {
                                    alert("Étudiant créé avec succès.");
                                    window.location = "/";
                                } else {
                                    alert("Erreur lors de la création de l'étudiant.");
                                }
                            })
                            .catch(error => console.error('Erreur:', error));
                        }
                    
                    });
                } else {
                    alert("Erreur lors de la suppression de l'étudiant.");
                }
            })
            .catch(error => console.error('Erreur:', error));
    }
    else{
        const form = document.querySelector('form');
        const formData = new FormData(form);
        
        fetch('/edit', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (response.ok) {
                alert("Étudiant modifiée avec succès.");
                window.location = "/";
            } else {
                alert("Erreur lors de la création de l'étudiant.");
            }
        })
        .catch(error => console.error('Erreur:', error));
    }
    
}


function clickRecherche() {
    const searchValue = document.getElementById('search').value;
    window.location.href = '/list?search=' + encodeURIComponent(searchValue);
    
}   