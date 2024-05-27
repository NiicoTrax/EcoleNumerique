let timerDisplay = document.getElementById("timer-display");
let timeInput = document.getElementById("time-input");
let startStopButton = document.getElementById("start-stop-button");
let resetButton = document.getElementById("reset-button");
let alertDiv = document.getElementById("alert");

let countdown;  // Identifiant de l'intervalle pour le décompte
let isCounting = false;  // Indique si le chronomètre est en cours de fonctionnement
let totalSeconds = 0;  // Temps total en secondes

// Écouteur d'événements pour le bouton start/stop
startStopButton.addEventListener("click", () => {
    if (isCounting) {
        // Si le chronomètre est en cours, arrête le décompte
        clearInterval(countdown);
        startStopButton.textContent = "Reprendre";  // Met à jour le texte du bouton pour "Reprendre"
    } else {
        // Si le chronomètre est arrêté, démarre ou reprend le décompte
        if (totalSeconds === 0) {
            // Si c'est le premier démarrage, récupère le temps saisi par l'utilisateur
            let timeParts = timeInput.value.split(":");
            let hours = parseInt(timeParts[0]);
            let minutes = parseInt(timeParts[1]);
            let seconds = parseInt(timeParts[2] || 0);
            totalSeconds = hours * 3600 + minutes * 60 + seconds;
        }
        startCountdown();  // Démarre ou reprend le décompte
        startStopButton.textContent = "Stop";  // Met à jour le texte du bouton pour "Stop"
        alertDiv.style.display = "none";  // Cache l'alerte si elle est affichée
        alertDiv.classList.remove("blink");  // Supprime l'animation clignotante si elle est présente
    }
    isCounting = !isCounting;  // Inverse l'état du chronomètre
});

// Écouteur d'événements pour le bouton reset
resetButton.addEventListener("click", () => {
    // Arrête le décompte et réinitialise le temps total à zéro
    clearInterval(countdown);
    totalSeconds = 0;
    updateDisplay(totalSeconds);  // Met à jour l'affichage pour afficher 00:00:00
    startStopButton.textContent = "Lancer";  // Remet le bouton start/stop à "Lancer"
    alertDiv.style.display = "none";  // Cache l'alerte si elle est affichée
    alertDiv.classList.remove("blink");  // Supprime l'animation clignotante si elle est présente
    isCounting = false;  // Réinitialise l'état du chronomètre
});

// Fonction pour démarrer ou reprendre le décompte
function startCountdown() {
    countdown = setInterval(() => {
        if (totalSeconds <= 0) {
            // Si le temps est écoulé, arrête le décompte
            clearInterval(countdown);
            isCounting = false;  // Indique que le chronomètre est arrêté
            startStopButton.textContent = "Lancer";  // Met à jour le texte du bouton
            alertDiv.style.display = "block";  // Affiche l'alerte
            alertDiv.classList.add("blink");  // Ajoute l'animation clignotante
        } else {
            // Décrémente le temps total de 1 seconde
            totalSeconds--;
            // Met à jour l'affichage avec le nouveau temps
            updateDisplay(totalSeconds);
        }
    }, 1000);  // Répète l'opération toutes les secondes
}

// Fonction pour mettre à jour l'affichage du temps
function updateDisplay(seconds) {
    // Convertit les secondes en heures, minutes et secondes
    let hours = Math.floor(seconds / 3600);
    let minutes = Math.floor((seconds % 3600) / 60);
    let secs = seconds % 60;

    // Met à jour l'affichage avec le format hh:mm:ss
    timerDisplay.textContent = `${pad(hours)}:${pad(minutes)}:${pad(secs)}`;
}

// Fonction pour ajouter un zéro devant les chiffres inférieurs à 10
function pad(number) {
    return number < 10 ? "0" + number : number;
}
