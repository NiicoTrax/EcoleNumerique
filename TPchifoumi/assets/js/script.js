document.addEventListener('DOMContentLoaded', () => {
    // Définit les choix possibles pour le jeu
    const choix = ['pierre', 'papier', 'ciseaux'];
    // Initialise les scores des joueurs et de l'ordinateur
    let scoreJoueur = 0;
    let scoreOrdinateur = 0;
    // Objet pour compter les occurrences des résultats dans l'historique
    const historiqueComptes = {};

    // Ajoute un écouteur d'événement de clic à chaque élément de choix
    document.querySelectorAll('.choix').forEach(choixElement => {
        choixElement.addEventListener('click', () => {
            // Obtient le choix du joueur à partir de l'ID de l'image cliquée
            const choixJoueur = choixElement.id;
            // Génère un choix aléatoire pour l'ordinateur
            const choixOrdinateur = choix[Math.floor(Math.random() * choix.length)];
            // Affiche le choix de l'ordinateur
            document.getElementById('choix-ordinateur').textContent = choixOrdinateur;
            // Détermine le résultat de la partie
            const resultat = obtenirResultat(choixJoueur, choixOrdinateur);
            // Affiche le résultat de la partie
            mettreAJourResultatJeu(resultat);
            // Met à jour les scores en fonction du résultat
            mettreAJourScores(resultat);
            // Met à jour l'historique des parties
            mettreAJourHistorique(choixJoueur, choixOrdinateur, resultat);
        });
    });

    // Ajoute un écouteur d'événement de clic au bouton de réinitialisation
    document.getElementById('reinitialiser-jeu').addEventListener('click', () => {
        reinitialiserJeu();
    });

    // Fonction pour déterminer le résultat de la partie
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

    // Fonction pour afficher le résultat du jeu avec une animation
    function mettreAJourResultatJeu(resultat) {
        const resultatJeuElement = document.getElementById('resultat-jeu');
        resultatJeuElement.textContent = resultat;
        resultatJeuElement.classList.remove('victoire', 'defaite', 'egalite');
        if (resultat === 'Victoire') {
            resultatJeuElement.classList.add('victoire');
        } else if (resultat === 'Défaite') {
            resultatJeuElement.classList.add('defaite');
        } else {
            resultatJeuElement.classList.add('egalite');
        }
    }

    // Fonction pour mettre à jour les scores en fonction du résultat
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

    // Fonction pour animer le changement de score
    function animerChangementDeScore(element) {
        element.classList.add('changement-de-score');
        setTimeout(() => {
            element.classList.remove('changement-de-score');
        }, 500);
    }

    // Fonction pour mettre à jour l'historique des parties
    function mettreAJourHistorique(joueur, ordinateur, resultat) {
        // Génère une clé unique pour chaque combinaison de résultats
        const cleHistorique = `${joueur}-${ordinateur}-${resultat}`;
        // Incrémente le compteur pour cette combinaison de résultats
        if (historiqueComptes[cleHistorique]) {
            historiqueComptes[cleHistorique]++;
        } else {
            historiqueComptes[cleHistorique] = 1;
        }
        // Affiche l'historique mis à jour
        afficherHistorique(joueur, ordinateur, resultat, historiqueComptes[cleHistorique]);
    }

    // Fonction pour afficher l'historique des parties
    function afficherHistorique(joueur, ordinateur, resultat, compte) {
        const historique = document.getElementById('historique-jeu');
        // Retire la classe last-entry de l'ancienne dernière entrée et lui ajoute la classe du résultat
        const ancienneDerniereEntree = document.querySelector('#historique-jeu li.last-entry');
        if (ancienneDerniereEntree) {
            ancienneDerniereEntree.classList.remove('last-entry');
            ancienneDerniereEntree.classList.add(ancienneDerniereEntree.dataset.resultat);
        }
        // Ajoute un nouvel élément de liste pour le dernier résultat
        const listItem = document.createElement('li');
        listItem.textContent = `Vous: ${joueur}, Ordinateur: ${ordinateur} - ${resultat} (x${compte})`;
        listItem.classList.add('last-entry');
        listItem.dataset.resultat = resultat.toLowerCase(); // Stocke le résultat dans un data-attribute
        historique.insertBefore(listItem, historique.firstChild);
    }

    // Fonction pour réinitialiser le jeu
    function reinitialiserJeu() {
        scoreJoueur = 0;
        scoreOrdinateur = 0;
        // Réinitialise les compteurs d'historique
        Object.keys(historiqueComptes).forEach(cle => delete historiqueComptes[cle]);
        // Réinitialise les scores affichés
        document.getElementById('score-joueur').textContent = scoreJoueur;
        document.getElementById('score-ordinateur').textContent = scoreOrdinateur;
        // Réinitialise les choix et le résultat affichés
        document.getElementById('choix-ordinateur').textContent = '';
        document.getElementById('resultat-jeu').textContent = '';
        // Efface l'historique
        const historique = document.getElementById('historique-jeu');
        historique.innerHTML = '';
    }
});
