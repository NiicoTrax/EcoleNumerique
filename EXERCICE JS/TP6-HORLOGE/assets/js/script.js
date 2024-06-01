// Initialize the current time
var currentTime = new Date();
var time = currentTime.getSeconds() + 60 * currentTime.getMinutes() + 3600 * currentTime.getHours();
var hour = currentTime.getHours();
var minute = currentTime.getMinutes();
var second = currentTime.getSeconds(); 

// Define IDs for the clock hands elements
var secondHand = document.getElementById("seconde");
var minuteHand = document.getElementById("minute");
var hourHand = document.getElementById("heure");

// Rotate the hands based on the initial time
secondHand.style.transform = "rotate(" + (time * 6) + "deg) translateX(-50%)";
minuteHand.style.transform = "rotate(" + Math.round(time / 10) + "deg) translateX(-50%)";
hourHand.style.transform = "rotate(" + Math.round(time / 120) + "deg) translateX(-50%)";

// Update the hands every second
setInterval(function() {
    // Increment the time by one second
    time++;
    // Update the rotation of the hands
    secondHand.style.transform = "rotate(" + (time * 6) + "deg) translateX(-50%)";
    minuteHand.style.transform = "rotate(" + Math.round(time / 10) + "deg) translateX(-50%)";
    hourHand.style.transform = "rotate(" + Math.round(time / 120) + "deg) translateX(-50%)";
}, 1000);
