document.addEventListener('DOMContentLoaded', () => {
    // Define possible choices for the game
    const choix = ['pierre', 'papier', 'ciseaux'];
    // Initialize player and computer scores
    let scoreJoueur = 0;
    let scoreOrdinateur = 0;
    // Game round counter
    let compteurParties = 0;
    // Object to store game history
    let historiqueJeu = [];

    // Add click event listener to each choice element
    document.querySelectorAll('.choix').forEach(choixElement => {
        choixElement.addEventListener('click', () => {
            if (compteurParties < 10) {
                // Get the player's choice from the clicked image ID
                const choixJoueur = choixElement.id;
                // Generate a random choice for the computer
                const choixOrdinateur = choix[Math.floor(Math.random() * choix.length)];
                // Display the player's choice
                document.getElementById('choix-vous').textContent = choixJoueur;
                // Display the computer's choice
                document.getElementById('choix-ordinateur').textContent = choixOrdinateur;
                // Determine the result of the game
                const resultat = obtenirResultat(choixJoueur, choixOrdinateur);
                // Display the game result
                mettreAJourResultatJeu(resultat);
                // Update the scores based on the result
                mettreAJourScores(resultat);
                // Update the game history
                mettreAJourHistorique(choixJoueur, choixOrdinateur, resultat);
                // Increment the round counter
                compteurParties++;
                
                if (compteurParties === 10) {
                    afficherResultatFinal();
                }
            }
        });
    });

    // Add click event listener to the reset button
    document.getElementById('reinitialiser-jeu').addEventListener('click', () => {
        reinitialiserJeu();
    });

    // Function to determine the result of the game
    function obtenirResultat(joueur, ordinateur) {
        if (joueur === ordinateur) return 'Égalité';
        if ((joueur === 'pierre' && ordinateur === 'ciseaux') ||
            (joueur === 'ciseaux' && ordinateur === 'papier') ||
            (joueur === 'papier' && ordinateur === 'pierre')) {
            return 'Victoire';
        } else {
            return 'Défaite';
        }
    }

    // Function to display the game result with an animation
    function mettreAJourResultatJeu(resultat) {
        const resultatJeuElement = document.getElementById('resultat-jeu');
        resultatJeuElement.textContent = resultat;
        resultatJeuElement.classList.remove('victoire', 'défaite', 'égalité');
        if (resultat === 'Victoire') {
            resultatJeuElement.classList.add('victoire');
        } else if (resultat === 'Défaite') {
            resultatJeuElement.classList.add('défaite');
        } else {
            resultatJeuElement.classList.add('égalité');
        }
    }

    // Function to update the scores based on the result
    function mettreAJourScores(resultat) {
        const scoreJoueurElement = document.getElementById('score-joueur');
        const scoreOrdinateurElement = document.getElementById('score-ordinateur');
        if (resultat === 'Victoire') {
            scoreJoueur++;
            scoreJoueurElement.textContent = scoreJoueur;
            animerChangementDeScore(scoreJoueurElement);
        } else if (resultat === 'Défaite') {
            scoreOrdinateur++;
            scoreOrdinateurElement.textContent = scoreOrdinateur;
            animerChangementDeScore(scoreOrdinateurElement);
        }
    }

    // Function to animate the score change
    function animerChangementDeScore(element) {
        element.classList.add('changement-de-score');
        setTimeout(() => {
            element.classList.remove('changement-de-score');
        }, 500);
    }

    // Function to update the game history
    function mettreAJourHistorique(joueur, ordinateur, resultat) {
        // Add the new result to the history
        historiqueJeu.unshift({ joueur, ordinateur, resultat });
        // Display the updated history
        afficherHistorique();
    }

    // Function to display the game history
    function afficherHistorique() {
        const historique = document.getElementById('historique-jeu');
        // Clear the current history
        historique.innerHTML = '';
        // Group results by type
        const groupes = historiqueJeu.reduce((acc, partie) => {
            const cle = `${partie.joueur}-${partie.ordinateur}-${partie.resultat}`;
            if (!acc[cle]) {
                acc[cle] = { ...partie, count: 0 };
            }
            acc[cle].count++;
            return acc;
        }, {});

        // Add each group of results to the history
        Object.values(groupes).forEach((partie, index) => {
            const listItem = document.createElement('li');
            listItem.textContent = `Vous: ${partie.joueur}, Ordinateur: ${partie.ordinateur} - ${partie.resultat} (x${partie.count})`;
            listItem.classList.add(partie.resultat.toLowerCase());
            if (index === 0) {
                listItem.classList.add('last-entry');
            }
            historique.appendChild(listItem);
        });
    }

    // Function to display the final result
    function afficherResultatFinal() {
        // Hide the "jeu" div
        document.getElementById('jeu').style.display = 'none';
        // Show the "fin-de-jeu" div
        document.getElementById('fin-de-jeu').style.display = 'block';

        // Display the winner
        const gagnantJeuElement = document.getElementById('gagnant-jeu');
        if (scoreJoueur > scoreOrdinateur) {
            gagnantJeuElement.textContent = 'Vous avez gagné !';
            gagnantJeuElement.classList.add('victoire');
        } else if (scoreJoueur < scoreOrdinateur) {
            gagnantJeuElement.textContent = 'L\'ordinateur a gagné !';
            gagnantJeuElement.classList.add('défaite');
        } else {
            gagnantJeuElement.textContent = 'C\'est une égalité !';
            gagnantJeuElement.classList.add('égalité');
        }

        // Display the final game history
        const historiqueFinal = document.getElementById('historique-jeu-final');
        historiqueFinal.innerHTML = '';
        historiqueJeu.forEach((partie) => {
            const listItem = document.createElement('li');
            listItem.textContent = `Vous: ${partie.joueur}, Ordinateur: ${partie.ordinateur} - ${partie.resultat}`;
            listItem.classList.add(partie.resultat.toLowerCase());
            historiqueFinal.appendChild(listItem);
        });
    }

    // Add click event listener to the restart button
    document.getElementById('recommencer-jeu').addEventListener('click', () => {
        recommencerJeu();
    });

    // Function to reset the game
    function reinitialiserJeu() {
        scoreJoueur = 0;
        scoreOrdinateur = 0;
        compteurParties = 0;
        historiqueJeu = [];
        // Reset displayed scores
        document.getElementById('score-joueur').textContent = scoreJoueur;
        document.getElementById('score-ordinateur').textContent = scoreOrdinateur;
        // Reset displayed choices and result
        document.getElementById('choix-ordinateur').textContent = '';
        document.getElementById('choix-vous').textContent = '';
        document.getElementById('resultat-jeu').textContent = '';
        document.getElementById('resultat-jeu').classList.remove('victoire', 'défaite', 'égalité');
        // Clear the history
        const historique = document.getElementById('historique-jeu');
        historique.innerHTML = '';
        // Show the "jeu" div and hide the "fin-de-jeu" div
        document.getElementById('jeu').style.display = 'block';
        document.getElementById('fin-de-jeu').style.display = 'none';
    }

    // Function to restart the game
    function recommencerJeu() {
        reinitialiserJeu();
    }
});
