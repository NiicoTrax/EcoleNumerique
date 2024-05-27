document.addEventListener('DOMContentLoaded', () => {
    // Définit les choix possibles pour le jeu
    const choix = ['pierre', 'papier', 'ciseaux'];
    // Initialise les scores des joueurs et de l'ordinateur
    let scoreJoueur = 0;
    let scoreOrdinateur = 0;
    // Objet pour stocker l'historique des parties
    let historiqueJeu = [];

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
        resultatJeuElement.classList.remove('victoire', 'défaite', 'égalité');
        if (resultat === 'Victoire') {
            resultatJeuElement.classList.add('victoire');
        } else if (resultat === 'Défaite') {
            resultatJeuElement.classList.add('défaite');
        } else {
            resultatJeuElement.classList.add('égalité');
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
        // Ajoute le nouveau résultat à l'historique
        historiqueJeu.unshift({ joueur, ordinateur, resultat });
        // Affiche l'historique mis à jour
        afficherHistorique();
    }

    // Fonction pour afficher l'historique des parties
    function afficherHistorique() {
        const historique = document.getElementById('historique-jeu');
        // Efface l'historique actuel
        historique.innerHTML = '';
        // Regroupe les résultats par type
        const groupes = historiqueJeu.reduce((acc, partie) => {
            const cle = `${partie.joueur}-${partie.ordinateur}-${partie.resultat}`;
            if (!acc[cle]) {
                acc[cle] = { ...partie, count: 0 };
            }
            acc[cle].count++;
            return acc;
        }, {});

        // Ajoute chaque groupe de résultats à l'historique
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

    // Fonction pour réinitialiser le jeu
    function reinitialiserJeu() {
        scoreJoueur = 0;
        scoreOrdinateur = 0;
        historiqueJeu = [];
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
