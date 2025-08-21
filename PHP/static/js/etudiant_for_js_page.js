var currentPage = 1;
var nbrPage = 1; // Assuming you have a total of 10 pages

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
                                <td>${row.date_naissance}</td>
                                <td>${row.filiere}</td>
                                <td><a href="#" onclick="deleteEtudiant(${row.id}, '${row.nom}')" class="btn">Supprimer</a> <a class="btn" href="/edit?id=${row.id}">modifier</a></td>
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