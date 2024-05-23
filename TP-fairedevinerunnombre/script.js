let randomNumber = Math.floor(Math.random() * 100) + 1;
let attempts = 0;
let maxAttempts = 10;
let previousGuesses = [];

function makeGuess() {
    const guessInput = document.getElementById('guessInput');
    const message = document.getElementById('message');
    const previousGuessesElement = document.getElementById('previousGuesses');
    const restartButton = document.getElementById('restartButton');
    let userGuess = parseInt(guessInput.value);

    if (isNaN(userGuess) || userGuess < 1 || userGuess > 100) {
        message.textContent = 'Veuillez entrer un nombre valide entre 1 et 100.';
        return;
    }

    attempts++;
    previousGuesses.push(userGuess);

    if (userGuess === randomNumber) {
        message.textContent = `Félicitations! Vous avez deviné le bon nombre (${randomNumber}) en ${attempts} tentatives.`;
        endGame();
    } else if (attempts >= maxAttempts) {
        message.textContent = `Désolé, vous avez utilisé toutes vos tentatives. Le nombre était ${randomNumber}.`;
        endGame();
    } else {
        if (userGuess < randomNumber) {
            message.textContent = 'Trop bas!';
        } else {
            message.textContent = 'Trop haut!';
        }
        previousGuessesElement.textContent = `Tentatives précédentes: ${previousGuesses.join(', ')}`;
    }

    guessInput.value = '';
    guessInput.focus();
}

function endGame() {
    document.getElementById('guessInput').disabled = true;
    document.querySelector('button[onclick="makeGuess()"]').disabled = true;
    document.getElementById('restartButton').style.display = 'block';
}

function restartGame() {
    randomNumber = Math.floor(Math.random() * 100) + 1;
    attempts = 0;
    previousGuesses = [];
    document.getElementById('message').textContent = '';
    document.getElementById('previousGuesses').textContent = '';
    document.getElementById('guessInput').disabled = false;
    document.querySelector('button[onclick="makeGuess()"]').disabled = false;
    document.getElementById('guessInput').value = '';
    document.getElementById('restartButton').style.display = 'none';
    document.getElementById('guessInput').focus();
}
