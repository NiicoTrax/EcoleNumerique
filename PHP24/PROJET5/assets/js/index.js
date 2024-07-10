        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.getElementById('searchInput');

            searchInput.addEventListener('keyup', function() {
                const query = this.value.toLowerCase();
                fetch(`search.php?search=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        const tableBody = document.getElementById('livreTable');
                        tableBody.innerHTML = '';
                        if (data.length > 0) {
                            data.forEach(livre => {
                                const row = document.createElement('tr');
                                row.innerHTML = `
                                    <td>${livre.isbn}</td>
                                    <td>${livre.titre}</td>
                                    <td>${livre.auteur}</td>
                                    <td>${livre.annee_publication}</td>
                                    <td>${livre.genre}</td>
                                `;
                                tableBody.appendChild(row);
                            });
                        } else {
                            const row = document.createElement('tr');
                            row.innerHTML = '<td colspan="5">Aucun livre trouvé.</td>';
                            tableBody.appendChild(row);
                        }
                    });
            });
        });