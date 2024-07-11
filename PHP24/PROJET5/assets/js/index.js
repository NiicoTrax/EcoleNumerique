document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('searchInput');
    const tableBody = document.getElementById('livreTable');
    const loadingMessage = document.createElement('tr');
    loadingMessage.innerHTML = '<td colspan="5">Chargement...</td>';

    function fetchLivres(query = '', offset = 0) {
        tableBody.innerHTML = '';
        tableBody.appendChild(loadingMessage);

        fetch(`search.php?search=${encodeURIComponent(query)}&offset=${offset}`)
            .then(response => response.text())
            .then(html => {
                tableBody.innerHTML = html;
            })
            .catch(error => {
                tableBody.innerHTML = `<tr><td colspan="5">Erreur de chargement: ${error.message}</td></tr>`;
                console.error('Erreur de chargement:', error);
            });
    }

    searchInput.addEventListener('keyup', function() {
        const query = this.value.toLowerCase();
        fetchLivres(query);
    });

    // Fetch all books on initial load
    fetchLivres('');
});
