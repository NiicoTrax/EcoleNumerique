// Initialize the current time
var temps = new Date();
var time = temps.getSeconds() + 60 * temps.getMinutes() + 3600 * temps.getHours();
var donneHeure = temps.getHours();
var donneMinute = temps.getMinutes();
var donneSc= temps.getSeconds(); 

// Set IDs for the clock hand elements
var tempsSeconde = document.getElementById("seconde");
var tempsMinute = document.getElementById("minute");
var tempsHeure = document.getElementById("heure");

// Rotate clock hands based on the initial time
tempsSeconde.style.transform = "rotate(" + (time * 6) + "deg)";
tempsMinute.style.transform = "rotate(" + Math.round(time / 10) + "deg)";
tempsHeure.style.transform = "rotate(" + Math.round(time / 120) + "deg)";

// Update the clock hands every second
setInterval(function() {
    // Increment time by one second
    time++;
    // Update the rotation of the second, minute, and hour hands
    tempsSeconde.style.transform = "rotate(" + (time * 6) + "deg)";
    tempsMinute.style.transform = "rotate(" + Math.round(time / 10) + "deg)";
    tempsHeure.style.transform = "rotate(" + Math.round(time / 120) + "deg)";
},1000);
