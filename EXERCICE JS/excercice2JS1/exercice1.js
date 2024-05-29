const values = [];
const userInput = document.getElementById('userInput');
const addButton = document.getElementById('addButton');
const messagesDiv = document.getElementById('messages');
const randomValueDiv = document.getElementById('randomValue');
const fifthValueDiv = document.getElementById('fifthValue');
const showRandomButton = document.getElementById('showRandomButton');
const showAllButton = document.getElementById('showAllButton');
const removeLastButton = document.getElementById('removeLastButton');
const removeAllButton = document.getElementById('removeAllButton');

addButton.addEventListener('click', () => {
    const value = userInput.value.trim();
    if (value) {
        values.push(value);
        userInput.value = '';
        updateMessages();
    }
});

showRandomButton.addEventListener('click', () => {
    if (values.length >= 10) {
        const randomIndex = Math.floor(Math.random() * values.length);
        randomValueDiv.textContent = `Valeur aléatoire : ${values[randomIndex]}`;
    }
});

showAllButton.addEventListener('click', () => {
    if (values.length > 0) {
        const allValues = values.map((value, index) => `${index + 1} - ${value}`).join('\n');
        alert(allValues);
    }
});

removeLastButton.addEventListener('click', () => {
    if (values.length > 0) {
        values.pop();
        updateMessages();
    }
});

removeAllButton.addEventListener('click', () => {
    values.length = 0;
    updateMessages();
});

function updateMessages() {
    if (values.length >= 10) {
        messagesDiv.textContent = '';
        randomValueDiv.textContent = '';
        fifthValueDiv.textContent = `5ème valeur : ${values[4]}`;
    } else {
        messagesDiv.textContent = 'Entrez au moins 10 valeurs';
        randomValueDiv.textContent = '';
        fifthValueDiv.textContent = '';
    }
}
