// Sélectionne l'élément HTML avec l'ID "cat"
var catEl = document.getElementById("cat");

// Enregistre le temps de démarrage
var startTime = new Date().getTime();

// Fonction pour faire marcher le chat
var walkTheCat = function() {
    // Enregistre le temps actuel
    var currTime = new Date().getTime();
    
    // Calcule le nombre de secondes écoulées depuis le début
    var secondsElapsed = ((currTime - startTime) / 1000);
    
    // Calcule la nouvelle position "left" du chat en pixels
    // Ici, nous faisons avancer le chat de 100 pixels par seconde
    var newLeft = secondsElapsed * 100;
    
    // Met à jour la position "left" de l'élément chat
    catEl.style.left = newLeft + "px";
    
    // Si le chat n'a pas encore atteint le bord droit de la fenêtre, continue l'animation
    if (newLeft < window.innerWidth) {
        // Demande d'exécuter à nouveau cette fonction pour la prochaine image de l'animation
        window.requestAnimationFrame(walkTheCat);
    }
};

// Démarre l'animation en appelant walkTheCat pour la première fois
window.requestAnimationFrame(walkTheCat);
