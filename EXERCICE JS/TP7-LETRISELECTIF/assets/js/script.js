// Selecting necessary HTML elements
const wasteContainer = document.getElementById('waste-container');
const bins = document.querySelectorAll('.bin');
const submitButton = document.getElementById('submit-button');
const resultScreen = document.getElementById('result-screen');
const restartButton = document.getElementById('restart-button');
const scoreContainer = document.getElementById('score-container');
const titleContainer = document.getElementById('title-container');
const resultsDiv = document.getElementById('results');
const instructions = document.getElementById('instructions');
const detailButton = document.getElementById('detail-button');
const backButton = document.getElementById('back-button');
const detailsScreen = document.getElementById('details-screen');
const gameScreen = document.getElementById('game-screen');

let currentWaste = null;
let score = 0;
let wasteData = [];
let incorrectWaste = [];

// Fetch waste data from a JSON file
fetch('assets/js/waste.json')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.json();
    })
    .then(data => {
        wasteData = data;
        startGame();
    })
    .catch(error => console.error('There has been a problem with your fetch operation:', error));

// Function to start the game
function startGame() {
    adjustInstructions();
    wasteData = shuffleArray(wasteData).slice(0, 10); // Shuffle and select first 10 waste items
    displayWaste(); // Display the first waste item
}

// Function to display a waste item
function displayWaste() {
    if (wasteData.length > 0) {
        currentWaste = wasteData.pop();
        wasteContainer.innerHTML = `<img src="${currentWaste.image}" alt="${currentWaste.name}" style="width: 110px; height: auto;" id="waste-item"> <p>${currentWaste.name}</p>`;
        wasteContainer.style.animation = "bounceIn 1s"; // Add animation
        const wasteItem = document.getElementById('waste-item');
        wasteItem.addEventListener('dragstart', dragStart); // Add drag start event listener
    } else {
        showResults(); // Show results if no more waste items
    }
}

// Allow dropping the waste item
function allowDrop(event) {
    event.preventDefault();
}

// Start dragging the waste item
function dragStart(event) {
    event.dataTransfer.setData("text", event.target.id);
}

// Drop the waste item into the bin
function drop(event) {
    event.preventDefault();
    const data = event.dataTransfer.getData("text");
    const wasteItem = document.getElementById(data);
    const bin = event.target.closest('.bin');
    if (bin && bin.dataset.type === currentWaste.type) {
        score++; // Increase score for correct bin
    } else {
        incorrectWaste.push({
            name: currentWaste.name,
            correctBin: currentWaste.type,
            image: currentWaste.image
        }); // Add to incorrect waste list for wrong bin
    }
    displayWaste(); // Display next waste item
}

// Show the results of the game
function showResults() {
    document.getElementById('game-screen').classList.add('hidden');
    resultScreen.classList.remove('hidden');

    let scoreClass = '';
    let moodIcon = '';
    let moodColor = '';

    if (score <= 4) {
        scoreClass = 'score-low';
        moodIcon = 'fa-frown';
        moodColor = 'text-danger';
    } else if (score <= 7) {
        scoreClass = 'score-medium';
        moodIcon = 'fa-meh';
        moodColor = 'text-warning';
    } else {
        scoreClass = 'score-high';
        moodIcon = 'fa-smile';
        moodColor = 'text-success';
    }

    // Display the score and mood icon
    scoreContainer.innerHTML = `<p class="${scoreClass}">Votre score: ${score}/10</p>
                                <div class="score-mood ${moodColor}"><i class="fas ${moodIcon}"></i></div>`;

    if (incorrectWaste.length > 0) {
        titleContainer.innerHTML = `<h2>Déchets mal triés :</h2>`;
        displayIncorrectWaste(0); // Display incorrect waste items
    } else {
        titleContainer.innerHTML = `<p>Bravo ! Vous avez tout trié correctement !</p>`;
    }
}

// Display incorrect waste items
function displayIncorrectWaste(index) {
    if (index < incorrectWaste.length) {
        const waste = incorrectWaste[index];
        const div = document.createElement('li');
        div.className = `result-item ${waste.correctBin}`;
        div.innerHTML = `<img src="${waste.image}" alt="${waste.name}" style="width: 50px; height: auto; margin-right: 10px;"> ${waste.name} aurait dû aller dans la poubelle ${waste.correctBin}`;
        resultsDiv.appendChild(div);
        setTimeout(() => {
            div.style.opacity = 1;
            div.style.transform = 'translateY(0)';
            displayIncorrectWaste(index + 1); // Recursively display each incorrect waste item
        }, 500);
    }
}

// Add event listeners to buttons
submitButton.addEventListener('click', showResults);
restartButton.addEventListener('click', () => {
    window.location.reload();
});

detailButton.addEventListener('click', () => {
    resultScreen.classList.add('hidden');
    detailsScreen.classList.remove('hidden');
});

backButton.addEventListener('click', () => {
    detailsScreen.classList.add('hidden');
    resultScreen.classList.remove('hidden');
});

// Shuffle an array
function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
}

// Detect mobile or tablet devices
function isMobileOrTablet() {
    return window.innerWidth <= 768;
}

// Adjust instructions based on device type
function adjustInstructions() {
    if (isMobileOrTablet()) {
        instructions.innerText = "Cliquez sur la poubelle qui correspond le mieux au produit affiché.";
        bins.forEach(bin => {
            bin.removeAttribute('ondrop');
            bin.removeAttribute('ondragover');
            bin.addEventListener('click', function() {
                if (this.dataset.type === currentWaste.type) {
                    score++;
                } else {
                    incorrectWaste.push({
                        name: currentWaste.name,
                        correctBin: currentWaste.type,
                        image: currentWaste.image
                    });
                }
                displayWaste(); // Display next waste item
            });
        });
    } else {
        instructions.innerText = "Glissez et déposez les déchets dans la poubelle appropriée.";
        bins.forEach(bin => {
            bin.setAttribute('ondrop', 'drop(event)');
            bin.setAttribute('ondragover', 'allowDrop(event)');
        });
    }
}
