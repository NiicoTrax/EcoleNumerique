document.addEventListener('DOMContentLoaded', () => {
    // Paths to card images
    const cardImages = [
        'assets/images/card1.png', 'assets/images/card1.png',
        'assets/images/card2.png', 'assets/images/card2.png',
        'assets/images/card3.png', 'assets/images/card3.png',
        'assets/images/card4.png', 'assets/images/card4.png',
        'assets/images/card5.png', 'assets/images/card5.png',
        'assets/images/card6.png', 'assets/images/card6.png',
        'assets/images/card7.png', 'assets/images/card7.png',
        'assets/images/card8.png', 'assets/images/card8.png'
    ];

    // Selecting necessary elements
    let gameBoard = document.getElementById('game-board');
    let resetBtn = document.getElementById('reset-btn');
    let gameOverScreen = document.getElementById('game-over');
    let finalScore = document.getElementById('final-score');
    let playAgainBtn = document.getElementById('play-again-btn');
    let header = document.querySelector('header');

    // Game variables
    let firstCard = null;
    let secondCard = null;
    let matches = 0;
    let attempts = 0;
    let lockBoard = false;

    // Shuffle function to randomize card positions
    function shuffle(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
        return array;
    }

    // Create the game board with shuffled cards
    function createBoard() {
        gameBoard.innerHTML = '';
        let shuffledCards = shuffle(cardImages);
        shuffledCards.forEach(cardImage => {
            let cardElement = document.createElement('div');
            cardElement.classList.add('card');
            let imgElement = document.createElement('img');
            imgElement.src = cardImage;
            cardElement.appendChild(imgElement);
            cardElement.dataset.cardValue = cardImage;
            cardElement.addEventListener('click', flipCard);
            gameBoard.appendChild(cardElement);
        });
    }

    // Handle card flip logic
    function flipCard() {
        if (lockBoard || this === firstCard || this.classList.contains('flipped')) return;

        this.classList.add('flipped');

        if (!firstCard) {
            firstCard = this;
        } else {
            secondCard = this;
            attempts++;
            lockBoard = true;
            checkForMatch();
        }
    }

    // Check if the flipped cards are a match
    function checkForMatch() {
        let isMatch = firstCard.dataset.cardValue === secondCard.dataset.cardValue;
        if (isMatch) {
            firstCard.classList.add('matched');
            secondCard.classList.add('matched');
            matchSound.play();
            matches++;
            resetTurn();
            if (matches === cardImages.length / 2) {
                setTimeout(endGame, 1000);
            }
        } else {
            noMatchSound.play();
            setTimeout(() => {
                firstCard.classList.remove('flipped');
                secondCard.classList.remove('flipped');
                resetTurn();
            }, 1000);
        }
    }

    // Reset the variables for the next turn
    function resetTurn() {
        firstCard = null;
        secondCard = null;
        lockBoard = false;
    }

    // End the game and display the score
    function endGame() {
        gameBoard.classList.add('d-none');
        gameOverScreen.style.display = 'block';
        finalScore.textContent = attempts;
        header.style.display = 'none'; // Hide the header
        resetBtn.style.display = 'none'; // Hide the reset button
        const details = document.createElement('p');
        details.classList.add('details');
        details.innerHTML = `Vous avez trouvé <strong>${matches}</strong> paires en <strong>${attempts}</strong> tentatives.`;
        gameOverScreen.appendChild(details);
        victorySound.play();
    }

    // Reset the game board and start a new game
    resetBtn.addEventListener('click', () => {
        matches = 0;
        attempts = 0;
        gameBoard.classList.remove('d-none');
        gameOverScreen.style.display = 'none';
        header.style.display = 'block'; // Show the header
        resetBtn.style.display = 'block'; // Show the reset button
        const details = document.querySelector('.details');
        if (details) details.remove();
        createBoard();
    });

    // Restart the game when the play again button is clicked
    playAgainBtn.addEventListener('click', () => {
        matches = 0;
        attempts = 0;
        gameBoard.classList.remove('d-none');
        gameOverScreen.style.display = 'none';
        header.style.display = 'block'; // Show the header
        resetBtn.style.display = 'block'; // Show the reset button
        const details = document.querySelector('.details');
        if (details) details.remove();
        createBoard();
    });

    // Initial setup
    createBoard();
});
