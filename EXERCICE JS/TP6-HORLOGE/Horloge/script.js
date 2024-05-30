

var temps = new Date();
var time = temps.getSeconds() + 60 * temps.getMinutes() + 3600 * temps.getHours();
var donneHeure = temps.getHours();
var donneMinute = temps.getMinutes();
var donneSc= temps.getSeconds(); 



var tempsSec = document.getElementById("seconde");
var tempsMin = document.getElementById("minute");
var tempsHeure = document.getElementById("heure");

tempsSec.style.transform = "rotate(" + (time * 6) + "deg)";
tempsMin.style.transform = "rotate(" + Math.round(time / 10) + "deg)";
tempsHeure.style.transform = "rotate(" + Math.round(time / 120) + "deg)";



setInterval(function() {

    time++;

    tempsSec.style.transform = "rotate(" + (time * 6) + "deg)";
    tempsMin.style.transform = "rotate(" + Math.round(time / 10) + "deg)";
    tempsHeure.style.transform = "rotate(" + Math.round(time / 120) + "deg)";

},1000);









