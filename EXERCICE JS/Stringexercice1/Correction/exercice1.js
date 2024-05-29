
var monTexte = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua";

//Completer le code suivant pour afficher la longueur de la variable monTexte

alert(monTexte.length);


//Ajouter du code ci dessous pour réaliser la suite de l'exercice

//premiere position de i 
var pos_i= "i"; 
var search= monTexte.search(pos_i); 
document.getElementById('position').innerHTML= search;


//monTexte en majuscules
var up= monTexte.toUpperCase();
document.getElementById('chaineMaj').innerHTML= up; 


//nombre de a dans monTexte

function nbre_caracteres(lettre,mot)
{
    mot = mot.split('');
    var nbre_de_fois_trouve = 0;
    for(var i = 0; i < mot.length; i++)
    {
        if(lettre == mot[i])
            nbre_de_fois_trouve++;
    }
    return nbre_de_fois_trouve;
}
alert(nbre_caracteres('a',monTexte));




