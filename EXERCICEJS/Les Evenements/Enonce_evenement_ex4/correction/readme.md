# Exercices JavaScript

**IMPORTANT**

Vérifiez votre code dans le navigateur

## Exercice 4 :

Complétez l'événement, et dans une fonction, récupérez la valeur des inputs (nom, prénom, ville), pour afficher les réponses dans une alerte.  






** Pour récupérer la valeur d'un élément saisi dans un input 

document.getElementById('IdDeMonInput').value;

Vous pouvez stocker cette valeur dans une variable : 
exemple : 
var ValeurSaisie = document.getElementById('IdDeMonInput').value;

Vous pourriez ensuite retourner cette valeur dans une autre div ou dans une boite de dialogue (par exemple)

document.getElementById('Mydiv').innerHTML= ValeurSaisie;

Si vous récupérez un nombre, vous pourriez utiliser les opérateurs arithmétiques

var Valeur1 = document.getElementById('IdDeMonInput1').value;
var Valeur2 = document.getElementById('IdDeMonInput2').value;

var total= Valeur1+Valeur2;
document.getElementById('Mydiv').innerHTML= total;


Pour arrondir un nombre utilisez math.round(); - Faites des recherches 