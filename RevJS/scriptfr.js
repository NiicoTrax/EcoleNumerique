// Déclarer une variable nommée nomVoiture et lui assigner la valeur "Peugeot"
var nomVoiture = "Peugeot";

// Déclarer une variable nommée x et lui assigner la valeur 50
var x = 50;

// Ajouter un élément div avec l'id "demo" au corps du document HTML
document.body.innerHTML += '<div id="demo"></div>';

// Déclarer deux variables, z et w, leur assigner les valeurs 5 et 10 respectivement,
// calculer leur somme et afficher le résultat dans l'élément avec l'id "demo"
var z = 5;
var w = 10;
document.getElementById("demo").innerHTML = `z vaut ${z}, w vaut ${w}, le résultat est : ${z + w}`;

// Déclarer une variable nommée d, lui assigner la somme de z et w,
// et afficher la valeur de d dans une boîte d'alerte
var d = z + w;
alert("La somme de z et w est: " + d);

// Déclarer trois variables en une seule ligne : prenom avec la valeur "John", nom avec la valeur "Doe" et age avec la valeur 35
var prenom = "John", nom = "Doe", age = 35;

// Afficher le résultat de 10 multiplié par 5 dans une boîte d'alerte
alert("10 multiplié par 5 est: " + (10 * 5));

// Afficher le résultat de 10 divisé par 2 dans une boîte d'alerte
alert("10 divisé par 2 est: " + (10 / 2));

// Afficher le reste de la division de 15 par 9 dans une boîte d'alerte
alert("Le reste de la division de 15 par 9 est: " + (15 % 9));

// Déclarer deux variables, l et k, leur assigner les valeurs 10 et 5 respectivement,
// puis ajouter la valeur de k à l en utilisant l'opérateur abrégé
var l = 10, k = 5;
l += k;

// Créer une fonction nommée maFonction qui affiche une boîte d'alerte avec le message "Salut tout le monde !"
function maFonction() {
    alert("Salut tout le monde !");
}

// Exécuter la fonction maFonction lors du chargement de la page
window.onload = function() {
    maFonction();

    // Créer une fonction nommée maFonctionDeRetour qui retourne la chaîne "Bonjour !",
    // et afficher cette valeur de retour dans l'élément avec l'id "demoRetour"
    function maFonctionDeRetour() {
        return "Bonjour !";
    }
    document.getElementById("demoRetour").innerHTML = maFonctionDeRetour();

    // Ajouter un bouton avec l'id "monBoutton" au corps du document HTML
    document.body.innerHTML += '<button id="monBoutton">Click ici</button>';

    // Ajouter un écouteur d'événement de clic au bouton qui affiche une boîte d'alerte lorsque le bouton est cliqué
    document.getElementById("monBoutton").addEventListener("click", function() {
        alert("Bouton cliqué !");
    });

    // Ajouter un div avec l'id "changeSurOver" au corps du document HTML,
    // et ajouter un écouteur d'événement de survol qui change la couleur de fond du div en rouge
    document.body.innerHTML += '<div id="changeSurOver" style="width:100px; height:100px; border:1px solid black;"></div>';
    document.getElementById("changeSurOver").addEventListener("mouseover", function() {
        this.style.backgroundColor = "red";
    });

    // Déclarer une variable nommée txt et lui assigner la valeur "une longue phrase",
    // puis déclarer une autre variable nommée longueur et lui assigner la longueur de la chaîne txt,
    // enfin afficher la valeur de longueur dans une boîte d'alerte
    var txt = "une longue phrase";
    var longueur = txt.length;
    alert("La longueur de la phrase est: " + longueur);

    // Déclarer deux variables, str1 et str2, avec les valeurs "Bonjour" et "le monde !",
    // puis afficher les deux chaînes en une seule ligne dans une boîte d'alerte
    var str1 = "Bonjour";
    var str2 = "le monde !";
    alert(str1 + " " + str2);

    // Déclarer un tableau nommé listeVoitures et lui assigner les valeurs "Renault", "Volvo" et "Citroen"
    var listeVoitures = ["Renault", "Volvo", "Citroen"];

    // Déclarer une variable nommée maVoiture et lui assigner la deuxième valeur du tableau listeVoitures
    var maVoiture = listeVoitures[1];

    // Changer la première valeur du tableau listeVoitures à "Ford"
    listeVoitures[0] = "Ford";

    // Afficher la longueur du tableau listeVoitures dans une boîte d'alerte
    alert("La longueur du tableau listeVoitures est: " + listeVoitures.length);

    // Retirer la dernière valeur du tableau listeVoitures en utilisant la méthode pop
    listeVoitures.pop();

    // Ajouter la valeur "Ferrari" à la fin du tableau listeVoitures
    listeVoitures.push("Ferrari");

    // Déclarer une variable nommée rNumber et lui assigner un nombre aléatoire
    var rNumber = Math.random();
    alert("Nombre aléatoire généré: " + rNumber);

    // Déclarer une variable nommée fNumber et lui assigner un nombre décimal de votre choix (par exemple, 15.7),
    // puis arrondir ce nombre à l'entier le plus proche
    var fNumber = 15.7;
    fNumber = Math.round(fNumber);
    alert("Le nombre " + 15.7 + " arrondi est: " + fNumber);

    // Déclarer deux variables, nombreUn et nombreDeux, et leur assigner les valeurs 10 et 5 respectivement,
    // puis créer une condition qui vérifie si nombreUn est supérieur à nombreDeux,
    // si c'est le cas, afficher une boîte d'alerte avec le message "nombreUn est supérieur à nombreDeux"
    var nombreUn = 10, nombreDeux = 5;
    if (nombreUn > nombreDeux) {
        alert("nombreUn est supérieur à nombreDeux");
    }

    // Déclarer deux variables, nombreTrois et nombreQuatre, et leur assigner la valeur 10,
    // puis créer une condition qui vérifie si nombreTrois est égal à nombreQuatre,
    // si c'est le cas, afficher une boîte d'alerte avec le message "nombreTrois est égal à nombreQuatre"
    var nombreTrois = 10, nombreQuatre = 10;
    if (nombreTrois === nombreQuatre) {
        alert("nombreTrois est égal à nombreQuatre");
    }

    // Créer une condition qui vérifie si nombreUn et nombreDeux n'ont pas la même valeur,
    // si c'est le cas, afficher une boîte d'alerte avec le message "nombreUn n'est pas égal à nombreDeux"
    if (nombreUn !== nombreDeux) {
        alert("nombreUn n'est pas égal à nombreDeux");
    }

    // Créer une boucle qui s'exécute de 0 à 9,
    // à chaque itération, afficher l'index de la boucle en utilisant console.log
    for (var i = 0; i < 10; i++) {
        console.log("L'index de la boucle est: " + i);
    }

    // Déclarer un tableau nommé fruits qui contient les éléments "pomme", "banane" et "poire"
    var fruits = ["pomme", "banane", "poire"];
    // Créer une boucle qui parcourt toutes les entrées du tableau fruits,
    // et à chaque itération, afficher l'index en utilisant console.log
    for (var j = 0; j < fruits.length; j++) {
        console.log("L'index du tableau fruits est: " + j);
    }

    // Créer une boucle qui s'exécute tant que la variable i est inférieure à 10
    var i = 0;
    while (i < 10) {
        i++;
    }

    // Créer une boucle qui s'exécute tant que la variable i est inférieure à 10,
    // mais incrémente i de 2 à chaque itération
    i = 0;
    while (i < 10) {
        i += 2;
    }

    // Créer une boucle qui s'exécute de 0 à 10,
    // dans la boucle, lorsque la valeur de l'index est égale à 5, afficher une boîte d'alerte avec un message personnalisé
    for (var k = 0; k <= 10; k++) {
        if (k === 5) {
            alert("Valeur index égale à 5");
        }
    }
};
