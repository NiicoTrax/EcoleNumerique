

/* Voici un exemple de fonction retournant du texte, inspirez vous de cet exemple pour réaliser l'exercice */


function txtReturn()
{
    return "monTexte";
}


function txtInsert() 
{
    return "J'aime le Javascript";
}


function backgroundSet() 
{
    return "magenta";
}





/* Ne modifiez pas le code suivant */

document.getElementById('container').innerHTML = txtInsert();
document.getElementById('container').style.background = backgroundSet();




