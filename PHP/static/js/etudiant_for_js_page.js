var currentPage = 1;
var nbrPage = 1; 

function deleteEtudiant(id, nom)
{
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
                            
                            fetch('/create_js', {
                                method: 'POST',
                                body: formData
                            })
                            .then(response => {
                                if (response.ok) {
                                    alert("Étudiant créé avec succès.");
                                    window.location = "/list_js";
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
        
        fetch('/edit_js', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (response.ok) {
                alert("Étudiant modifiée avec succès.");
                window.location = "/list_js";
            } else {
                alert("Erreur lors de la création de l'étudiant.");
            }
        })
        .catch(error => console.error('Erreur:', error));
    }
    
}



function loadEtudiants(searchValue='') {
    console.log("Chargement des étudiants...");
    const table = document.getElementById('etudiantTable');
    fetch('/list_json?page='+currentPage+'&search='+searchValue)
        .then(response => response.json())
        .then(data => {
            if (data.list.length === 0) {
                table.innerHTML = "<tr><td colspan='7'>Aucun étudiant trouvé.</td></tr>";
            } else {
                let rows = '';
                nbrPage = data.nbr_page;
                data.list.forEach(row => {
                    rows += `<tr>
                                <td>${row.nom}</td>
                                <td>${row.prenom}</td>
                                <td>${row.age}</td>
                                <td>${row.email}</td>
                                <td>${row.sexe}</td>
                                <td>${row.filiere}</td>
                                <td><a href="#" onclick="deleteEtudiant(${row.id}, '${row.nom}')" class="btn">Supprimer</a> <a class="btn" href="/edit_js?id=${row.id}">modifier</a></td>
                             </tr>`;
                });
               const tbody = table.tBodies[0];
                tbody.innerHTML = rows;

            }
        })
        .catch(error => console.error('Erreur:', error));
}


function clickRecherche() {
    currentPage = 1; // Reset to the first page on search
    const searchValue = document.getElementById('search').value;
    loadEtudiants(searchValue);
}

function prevPage() {
    const searchValue = document.getElementById('search').value;
    if (currentPage <= 1) {
        alert("Vous êtes déjà à la première page.");
        return;
    }
    currentPage--;
    console.log("Page actuelle:", currentPage);
    loadEtudiants(searchValue);
}

function nextPage() {
    const searchValue = document.getElementById('search').value;
    if(currentPage >= nbrPage) { 
        alert("Vous êtes déjà à la dernière page.");
        return;
    }
    currentPage++;
    console.log("Page actuelle:", currentPage);
    loadEtudiants(searchValue);
}