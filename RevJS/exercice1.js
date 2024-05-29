// Declare a variable named nomVoiture and assign it the value "Peugeot"
var nomVoiture = "Peugeot";

// Declare a variable named x and assign it the value 50
var x = 50;

// Add a div element with the id "demo" to the HTML body
document.body.innerHTML += '<div id="demo"></div>';

// Declare two variables, z and w, assign them the values 5 and 10 respectively,
// calculate their sum and display the result in the element with the id "demo"
var z = 5;
var w = 10;
document.getElementById("demo").innerHTML = `z vaut ${z}, w vaut ${w}, le résultat est : ${z + w}`;

// Declare a variable named d, assign it the sum of z and w,
// and display the value of d in an alert box
var d = z + w;
alert("La somme de z et w est: " + d);

// Declare three variables in one line: prenom with the value "John", nom with the value "Doe" and age with the value 35
var prenom = "John", nom = "Doe", age = 35;

// Display the result of 10 multiplied by 5 in an alert box
alert("10 multiplié par 5 est: " + (10 * 5));

// Display the result of 10 divided by 2 in an alert box
alert("10 divisé par 2 est: " + (10 / 2));

// Display the remainder of the division of 15 by 9 in an alert box
alert("Le reste de la division de 15 par 9 est: " + (15 % 9));

// Declare two variables, l and k, assign them the values 10 and 5 respectively,
// then add the value of k to l using the shorthand operator
var l = 10, k = 5;
l += k;

// Create a function named maFonction that displays an alert box with the message "Salut tout le monde !"
function maFonction() {
    alert("Salut tout le monde !");
}

// Execute the function maFonction when the page loads
window.onload = function() {
    maFonction();

    // Create a function named maFonctionDeRetour that returns the string "Bonjour !",
    // and display this return value in the element with the id "demoRetour"
    function maFonctionDeRetour() {
        return "Bonjour !";
    }
    document.getElementById("demoRetour").innerHTML = maFonctionDeRetour();

    // Add a button with the id "monBoutton" to the HTML body
    document.body.innerHTML += '<button id="monBoutton">Click ici</button>';

    // Add a click event listener to the button that displays an alert box when the button is clicked
    document.getElementById("monBoutton").addEventListener("click", function() {
        alert("Bouton cliqué !");
    });

    // Add a div with the id "changeSurOver" to the HTML body,
    // and add a mouseover event listener that changes the background color of the div to red
    document.body.innerHTML += '<div id="changeSurOver" style="width:100px; height:100px; border:1px solid black;"></div>';
    document.getElementById("changeSurOver").addEventListener("mouseover", function() {
        this.style.backgroundColor = "red";
    });

    // Declare a variable named txt and assign it the value "une longue phrase",
    // then declare another variable named longueur and assign it the length of the string txt,
    // finally display the value of longueur in an alert box
    var txt = "une longue phrase";
    var longueur = txt.length;
    alert("La longueur de la phrase est: " + longueur);

    // Declare two variables, str1 and str2, with the values "Bonjour" and "le monde !",
    // then display the two strings in one line in an alert box
    var str1 = "Bonjour";
    var str2 = "le monde !";
    alert(str1 + " " + str2);

    // Declare an array named listeVoitures and assign it the values "Renault", "Volvo" and "Citroen"
    var listeVoitures = ["Renault", "Volvo", "Citroen"];

    // Declare a variable named maVoiture and assign it the second value of the array listeVoitures
    var maVoiture = listeVoitures[1];

    // Change the first value of the array listeVoitures to "Ford"
    listeVoitures[0] = "Ford";

    // Display the length of the array listeVoitures in an alert box
    alert("La longueur du tableau listeVoitures est: " + listeVoitures.length);

    // Remove the last value of the array listeVoitures using the pop method
    listeVoitures.pop();

    // Add the value "Ferrari" to the end of the array listeVoitures
    listeVoitures.push("Ferrari");

    // Declare a variable named rNumber and assign it a random number
    var rNumber = Math.random();
    alert("Nombre aléatoire généré: " + rNumber);

    // Declare a variable named fNumber and assign it a decimal number of your choice (e.g., 15.7),
    // then round this number to the nearest integer
    var fNumber = 15.7;
    fNumber = Math.round(fNumber);
    alert("Le nombre " + 15.7 + " arrondi est: " + fNumber);

    // Declare two variables, nombreUn and nombreDeux, and assign them the values 10 and 5 respectively,
    // then create a condition that checks if nombreUn is greater than nombreDeux,
    // if so, display an alert box with the message "nombreUn est supérieur à nombreDeux"
    var nombreUn = 10, nombreDeux = 5;
    if (nombreUn > nombreDeux) {
        alert("nombreUn est supérieur à nombreDeux");
    }

    // Declare two variables, nombreTrois and nombreQuatre, and assign them the value 10,
    // then create a condition that checks if nombreTrois is equal to nombreQuatre,
    // if so, display an alert box with the message "nombreTrois est égal à nombreQuatre"
    var nombreTrois = 10, nombreQuatre = 10;
    if (nombreTrois === nombreQuatre) {
        alert("nombreTrois est égal à nombreQuatre");
    }

    // Create a condition that checks if nombreUn and nombreDeux do not have the same value,
    // if so, display an alert box with the message "nombreUn n'est pas égal à nombreDeux"
    if (nombreUn !== nombreDeux) {
        alert("nombreUn n'est pas égal à nombreDeux");
    }

    // Create a loop that runs from 0 to 9,
    // at each iteration, display the loop index using console.log
    for (var i = 0; i < 10; i++) {
        console.log("L'index de la boucle est: " + i);
    }

    // Declare an array named fruits that contains the elements "pomme", "banane" and "poire"
    var fruits = ["pomme", "banane", "poire"];
    // Create a loop that iterates over all entries of the array fruits,
    // and at each iteration, display the index using console.log
    for (var j = 0; j < fruits.length; j++) {
        console.log("L'index du tableau fruits est: " + j);
    }

    // Create a loop that runs as long as the variable i is less than 10
    var i = 0;
    while (i < 10) {
        i++;
    }

    // Create a loop that runs as long as the variable i is less than 10,
    // but increments i by 2 at each iteration
    i = 0;
    while (i < 10) {
        i += 2;
    }

    // Create a loop that runs from 0 to 10,
    // in the loop, when the index value is equal to 5, display an alert box with a custom message
    for (var k = 0; k <= 10; k++) {
        if (k === 5) {
            alert("Valeur index égale à 5");
        }
    }
};
