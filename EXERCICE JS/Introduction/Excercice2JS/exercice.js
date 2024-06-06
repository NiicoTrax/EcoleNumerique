
/* Modifiez le code suivant pour changer le innerHTML de myDiv2 */
document.getElementById('myDiv').innerHTML = "Texte affiché dans myDiv";
document.getElementById('myDiv').style.color='blue';

/* Le code suivant va modifier la propriété style.color de myDiv3 , le texte qu'il contient sera affiché en rouge
 */

document.getElementById('myDiv3').style.color='red';
document.getElementById('myDiv3').innerHTML = "Texte affiché dans myDiv2";

document.getElementById('myDiv2').style.color='red';
document.getElementById('myDiv2').innerHTML = "Texte affiché dans myDiv2";