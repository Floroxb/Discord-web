<!DOCTYPE html>
<html>

<head>
    <title>Liste des membres Discord</title>
</head>

<body>
    <h1>Liste des membres Discord</h1>
    <table>
        <thead>
            <tr>
                <th>Pseudo Discord</th>
                <th>Numéro Discord</th>
                <th>Connecté</th>
            </tr>
        </thead>
        <tbody id="memberTableBody"></tbody>
    </table>

    <script>
        const memberTableBody = document.getElementById('memberTableBody');

        // Effectuer une requête AJAX pour obtenir les données des membres
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    const members = JSON.parse(xhr.responseText);

                    // Ajouter les membres au tableau HTML
                    members.forEach((member) => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${member.username}</td>
                            <td>${member.discriminator}</td>
                            <td>${member.status}</td>
                        `;
                        memberTableBody.appendChild(row);
                    });
                } else {
                    console.error('Erreur lors de la récupération des données des membres');
                }
            }
        };
        xhr.open('GET', 'http://localhost/your-folder/content.php');
        xhr.send();
    </script>
</body>

</html>