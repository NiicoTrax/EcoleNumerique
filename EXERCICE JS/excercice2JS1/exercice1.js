const valeurs = [];
const inputUtilisateur = document.getElementById('inputUtilisateur');
const boutonAjouter = document.getElementById('boutonAjouter');
const messagesDiv = document.getElementById('messages');
const valeurAleatoireDiv = document.getElementById('valeurAleatoire');
const cinquiemeValeurDiv = document.getElementById('cinquiemeValeur');
const boutonAfficherAleatoire = document.getElementById('boutonAfficherAleatoire');
const boutonAfficherToutes = document.getElementById('boutonAfficherToutes');
const boutonSupprimerDerniere = document.getElementById('boutonSupprimerDerniere');
const boutonSupprimerToutes = document.getElementById('boutonSupprimerToutes');

// Event listener for the "Add" button
boutonAjouter.addEventListener('click', () => {
    const valeur = inputUtilisateur.value.trim();
    if (valeur) {
        valeurs.push(valeur);
        inputUtilisateur.value = '';
        updateMessages();
    }
});

// Event listener for the "Display a random value" button
boutonAfficherAleatoire.addEventListener('click', displayRandomValue);

// Event listener for the "Display all values" button
boutonAfficherToutes.addEventListener('click', () => {
    if (valeurs.length > 0) {
        const allValues = valeurs.map((valeur, index) => `${index + 1} - ${valeur}`).join('\n');
        alert(allValues);
    }
});

// Event listener for the "Delete last value" button
boutonSupprimerDerniere.addEventListener('click', () => {
    if (valeurs.length > 0) {
        valeurs.pop();
        updateMessages();
    }
});

// Event listener for the "Delete all values" button
boutonSupprimerToutes.addEventListener('click', () => {
    valeurs.length = 0;
    updateMessages();
});

// Function to update the messages and display the 5th value
function updateMessages() {
    if (valeurs.length >= 10) {
        messagesDiv.textContent = '';
        cinquiemeValeurDiv.textContent = `5th value: ${valeurs[4]}`;
        displayRandomValue(); // Automatically display a random value after 10 values are entered
    } else {
        messagesDiv.textContent = 'Enter at least 10 values';
        valeurAleatoireDiv.textContent = '';
        cinquiemeValeurDiv.textContent = '';
    }
}

// Function to display a random value
function displayRandomValue() {
    if (valeurs.length >= 10) {
        const randomIndex = Math.floor(Math.random() * valeurs.length);
        valeurAleatoireDiv.textContent = `Random value: ${valeurs[randomIndex]}`;
    }
}
