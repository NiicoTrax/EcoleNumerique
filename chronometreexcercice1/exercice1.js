// Récupère l'élément span qui affiche les secondes
var seconds = document.getElementById("seconds");

// Variable pour stocker l'identifiant du minuteur
var timer;

// Fonction qui incrémente la valeur des secondes et rappelle elle-même après 1 seconde
var countUp = function() {
    // Incrémente la valeur de la span par 1
    seconds.textContent = parseInt(seconds.textContent) + 1;
    // Appelle la fonction countUp à nouveau après 1 seconde
    timer = setTimeout(countUp, 1000);
};

// Démarre le chronomètre en appelant countUp pour la première fois
timer = setTimeout(countUp, 1000);

// Fonction pour arrêter le chronomètre
var stopCountUp = function() {
    // Arrête le minuteur en utilisant clearTimeout
    clearTimeout(timer);
};

// Récupère le bouton d'arrêt
var stopButton = document.getElementById("stop-button");

// Ajoute un écouteur d'événements au bouton d'arrêt pour appeler stopCountUp lorsqu'il est cliqué
stopButton.addEventListener("click", stopCountUp);


