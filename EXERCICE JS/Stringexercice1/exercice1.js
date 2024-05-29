

var monTexte = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua";

//Completer le code suivant pour afficher la longueur de la variable monTexte

alert("Longueur de mon Texte: " + monTexte.length);

//Ajouter du code ci dessous pour réaliser la suite de l'exercice


// Trouver la première position de la lettre "i" dans monTexte
var positionI = monTexte.indexOf('i');

// Afficher cette position dans l'élément ayant pour id "position"
document.getElementById('position').innerText = positionI;

// Stocker le contenu de monTexte en majuscules dans une nouvelle variable
var monTexteMaj = monTexte.toUpperCase();

// Afficher le contenu de cette nouvelle variable dans l'élément ayant pour id "chaineMaj"
document.getElementById('chaineMaj').innerText = monTexteMaj;

// Utiliser une boucle pour parcourir la chaîne et afficher une alerte à chaque fois que la lettre "a" est trouvée
for (var i = 0; i < monTexte.length; i++) {
    if (monTexte[i] === 'a') {
        alert("lettre (a) trouvée");
    }
}


