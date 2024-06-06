document.addEventListener('DOMContentLoaded', () => {
    const cardImages = {
        tresfacile: [
            'assets/images/Fruits/card1.png', 'assets/images/Fruits/card1.png',
            'assets/images/Fruits/card2.png', 'assets/images/Fruits/card2.png',
            'assets/images/Fruits/card3.png', 'assets/images/Fruits/card3.png',
            'assets/images/Fruits/card4.png', 'assets/images/Fruits/card4.png',
            'assets/images/Fruits/card5.png', 'assets/images/Fruits/card5.png',
            'assets/images/Fruits/card6.png', 'assets/images/Fruits/card6.png',
            'assets/images/Fruits/card7.png', 'assets/images/Fruits/card7.png',
            'assets/images/Fruits/card8.png', 'assets/images/Fruits/card8.png'
        ],
        facile: [
            'assets/images/Legumes/legume1.png', 'assets/images/Legumes/legume1.png',
            'assets/images/Legumes/legume2.png', 'assets/images/Legumes/legume2.png',
            'assets/images/Legumes/legume3.png', 'assets/images/Legumes/legume3.png',
            'assets/images/Legumes/legume4.png', 'assets/images/Legumes/legume4.png',
            'assets/images/Legumes/legume5.png', 'assets/images/Legumes/legume5.png',
            'assets/images/Legumes/legume6.png', 'assets/images/Legumes/legume6.png',
            'assets/images/Legumes/legume7.png', 'assets/images/Legumes/legume7.png',
            'assets/images/Legumes/legume8.png', 'assets/images/Legumes/legume8.png'
        ],
        moyen: [
            'assets/images/Emoji/emoji1.png', 'assets/images/Emoji/emoji1.png',
            'assets/images/Emoji/emoji2.png', 'assets/images/Emoji/emoji2.png',
            'assets/images/Emoji/emoji3.png', 'assets/images/Emoji/emoji3.png',
            'assets/images/Emoji/emoji4.png', 'assets/images/Emoji/emoji4.png',
            'assets/images/Emoji/emoji5.png', 'assets/images/Emoji/emoji5.png',
            'assets/images/Emoji/emoji6.png', 'assets/images/Emoji/emoji6.png',
            'assets/images/Emoji/emoji7.png', 'assets/images/Emoji/emoji7.png',
            'assets/images/Emoji/emoji8.png', 'assets/images/Emoji/emoji8.png',
            'assets/images/Emoji/emoji9.png', 'assets/images/Emoji/emoji9.png',
            'assets/images/Emoji/emoji10.png', 'assets/images/Emoji/emoji10.png'
        ],
        tresmoyen: [
            'assets/images/Bonbon/bonbon1.png', 'assets/images/Bonbon/bonbon1.png',
            'assets/images/Bonbon/bonbon2.png', 'assets/images/Bonbon/bonbon2.png',
            'assets/images/Bonbon/bonbon3.png', 'assets/images/Bonbon/bonbon3.png',
            'assets/images/Bonbon/bonbon4.png', 'assets/images/Bonbon/bonbon4.png',
            'assets/images/Bonbon/bonbon5.png', 'assets/images/Bonbon/bonbon5.png',
            'assets/images/Bonbon/bonbon6.png', 'assets/images/Bonbon/bonbon6.png',
            'assets/images/Bonbon/bonbon7.png', 'assets/images/Bonbon/bonbon7.png',
            'assets/images/Bonbon/bonbon8.png', 'assets/images/Bonbon/bonbon8.png',
            'assets/images/Bonbon/bonbon9.png', 'assets/images/Bonbon/bonbon9.png',
            'assets/images/Bonbon/bonbon10.png', 'assets/images/Bonbon/bonbon10.png'
        ],
        difficile: [
            'assets/images/Difficile/dur1.png', 'assets/images/Difficile/dur1.png',
            'assets/images/Difficile/dur2.png', 'assets/images/Difficile/dur2.png',
            'assets/images/Difficile/dur3.png', 'assets/images/Difficile/dur3.png',
            'assets/images/Difficile/dur4.png', 'assets/images/Difficile/dur4.png',
            'assets/images/Difficile/dur5.png', 'assets/images/Difficile/dur5.png',
            'assets/images/Difficile/dur6.png', 'assets/images/Difficile/dur6.png',
            'assets/images/Difficile/dur7.png', 'assets/images/Difficile/dur7.png',
            'assets/images/Difficile/dur8.png', 'assets/images/Difficile/dur8.png',
            'assets/images/Difficile/dur9.png', 'assets/images/Difficile/dur9.png',
            'assets/images/Difficile/dur10.png', 'assets/images/Difficile/dur10.png'
        ]
    };

    let currentLevel = 'tresfacile';
    let timerInterval;
    let timerStarted = false;
    const timeLimits = {
        tresfacile: null,
        facile: null,
        moyen: 120,
        tresmoyen: 120,
        difficile: 60
    };

    // Selecting necessary elements
    let gameBoard = document.getElementById('game-board');
    let resetBtn = document.getElementById('reset-btn');
    let gameOverScreen = document.getElementById('game-over');
    let finalScore = document.getElementById('final-score');
    let playAgainBtn = document.getElementById('play-again-btn');
    let header = document.querySelector('header');
    let detailsBtn = document.getElementById('details-btn');
    let gameDetails = document.getElementById('game-details');
    let backBtn = document.getElementById('back-btn');
    let levelButtons = document.querySelectorAll('.level-btn');
    let timerElement = document.getElementById('timer');
    let timeLeftElement = document.getElementById('time-left');

    // Game variables
    let firstCard = null;
    let secondCard = null;
    let matches = 0;
    let attempts = 0;
    let lockBoard = false;
    let timeLeft;

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
        let shuffledCards = shuffle(cardImages[currentLevel]);
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

        timerStarted = false;
        if (timeLimits[currentLevel]) {
            timerElement.classList.remove('d-none');
            timeLeft = timeLimits[currentLevel];
            timeLeftElement.textContent = timeLeft;
            clearInterval(timerInterval);
        } else {
            timerElement.classList.add('d-none');
        }
    }

    // Handle card flip logic
    function flipCard() {
        if (!timerStarted && timeLimits[currentLevel]) {
            timerStarted = true;
            timerInterval = setInterval(updateTimer, 1000);
        }

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
            matches++;
            resetTurn();
            if (matches === cardImages[currentLevel].length / 2) {
                setTimeout(endGame, 1000);
            }
        } else {
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
        clearInterval(timerInterval);
        gameBoard.classList.add('d-none');
        gameOverScreen.style.display = 'block';
        let score = calculateScore();
        finalScore.textContent = score;
        header.style.display = 'none';
        resetBtn.style.display = 'none';
        const details = document.createElement('p');
        details.classList.add('details');
        details.innerHTML = `Vous avez trouvé <strong>${matches}</strong> paires en <strong>${attempts}</strong> tentatives. Score final: ${score}`;
        gameOverScreen.appendChild(details);
    }

    // Calculate the final score
    function calculateScore() {
        let baseScore = matches * 100;
        let penalty = attempts * 10;
        let timeBonus = timeLeft ? timeLeft * 5 : 0;
        return baseScore - penalty + timeBonus;
    }

    // Update the timer
    function updateTimer() {
        timeLeft--;
        timeLeftElement.textContent = timeLeft;
        if (timeLeft <= 0) {
            endGame();
        }
    }

    // Reset the game board and start a new game
    resetBtn.addEventListener('click', () => {
        matches = 0;
        attempts = 0;
        gameBoard.classList.remove('d-none');
        gameOverScreen.style.display = 'none';
        header.style.display = 'block';
        resetBtn.style.display = '';
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
        header.style.display = 'block';
        resetBtn.style.display = '';
        const details = document.querySelector('.details');
        if (details) details.remove();
        createBoard();
    });

    // Toggle game details display
    detailsBtn.addEventListener('click', () => {
        gameDetails.classList.toggle('d-none');
    });

    // Return to game over screen from game details
    backBtn.addEventListener('click', () => {
        gameDetails.classList.add('d-none');
        gameOverScreen.style.display = 'block';
    });

    // Set the game level and create the board
    levelButtons.forEach(button => {
        button.addEventListener('click', () => {
            currentLevel = button.dataset.level;
            matches = 0;
            attempts = 0;
            gameBoard.classList.remove('d-none');
            gameOverScreen.style.display = 'none';
            header.style.display = 'block';
            resetBtn.style.display = '';
            const details = document.querySelector('.details');
            if (details) details.remove();
            createBoard();
        });
    });

    // Initial setup
    createBoard();
});
