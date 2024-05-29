let nomVoiture = "Peugeot"; let x = 50;

let z = 5; let w = 10; let d = z + w;

let prenom = "John"; let nom = "doe"; let age = 35;

let l = 10; let k = 5; l = l + k;

let txt = "une longue phrase"; let longueur = txt.length;

let str1 = "Bonjour"; let str2 = "le monde !";

let listeVoitures = [ "Renault", "Volvo", "Citroen"];

let maVoiture = listeVoitures[1];

let rNumber = Math.random() * 100; let fNumber = Math.round(52.7);

let nombreUn = 10; let nombreDeux = 5;

let nombreTrois = 10; let nombreQuatre = 10;

let fruits = [ "pomme", "banane", "poire" ];

maFonction ();

document.getElementById("demo").innerHTML = z + w;

alert(d);

alert(w * z);

alert(w / 2);

alert(15 % 9);

function maFonction () {

    alert("Salut tout le monde !")

}

function maFonctionDeRetour () {

    return "Bonjour!"

}

document.getElementById("demoRetour").innerHTML = maFonctionDeRetour();

document.getElementById("monButton").addEventListener("click", function () {

    alert("La voiture " + nomVoiture + " appartient à Monsieur " + nom + " " + prenom + ". Qui a " + age + " ans");

});

document.getElementById("changeSurOver").addEventListener("mouseover", function () {

   document.getElementById("changeSurOver").style.backgroundColor = "red";

});

alert(longueur);

alert(str1 + " " + str2);

listeVoitures[0] = "Ford";

alert(listeVoitures.length);

listeVoitures.pop();

listeVoitures.push("Ferrari");

if (nombreUn > nombreDeux) {

    alert("nombreUn est supérieur à nombreDeux");

}

if (nombreTrois === nombreQuatre) {

    alert("nombreTrois est égal à nombreQuatre");

}

if (nombreUn != nombreDeux) {

    alert("nombreUn n'est pas égal à nombreDeux");

}

for (let y = 0; y <= 9; y++) {

    console.log(y);

}

for (let x = 0; x <= fruits.length; x++) {

    console.log(x);

}

let i = 0;

while (i < 10) {

    console.log(i);

    i++;

}

let t = 0;

while (t < 10) {

    console.log(t);

    t = t + 2;

}

for (let z = 0; z <= 10; z++) {

    if (z === 5) {

        alert("On est a l'index 5");

    }

    console.log(z);

}

