document.addEventListener('DOMContentLoaded', () => {
    // Get references to the search input field and the table body element
    const searchInput = document.getElementById('searchInput');
    const tableBody = document.getElementById('livreTable');

    // Create a loading message element to display while fetching data
    const loadingMessage = document.createElement('tr');
    loadingMessage.innerHTML = '<td colspan="5">Chargement...</td>';

    // Function to fetch books based on the search query and offset
    function fetchLivres(query = '', offset = 0) {
        // Clear the table body and show the loading message
        tableBody.innerHTML = '';
        tableBody.appendChild(loadingMessage);

        // Make a fetch request to the server with the search query and offset
        fetch(`search.php?search=${encodeURIComponent(query)}&offset=${offset}`)
            .then(response => response.text()) // Parse the response as text
            .then(html => {
                tableBody.innerHTML = html; // Insert the fetched HTML into the table body
            })
            .catch(error => {
                // Display an error message in case of a failure
                tableBody.innerHTML = `<tr><td colspan="5">Erreur de chargement: ${error.message}</td></tr>`;
                console.error('Erreur de chargement:', error); // Log the error to the console
            });
    }

    // Event listener for keyup event on the search input field
    searchInput.addEventListener('keyup', function() {
        const query = this.value.toLowerCase(); // Get the search query and convert it to lowercase
        fetchLivres(query); // Fetch books based on the search query
    });

    // Fetch all books on initial load
    fetchLivres('');
});
