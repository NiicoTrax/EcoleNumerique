# Exercices JavaScript

## Exercice 8 :

En html : créez un input qui demandera l'âge de l'utilisateur. 
Dans le même formulaire ajoutez un bouton. 

Dans votre fichier JS: 
Créeez un fonction qui écoutera l'événement,au clic sur le bouton. (Reportez vous aux exercices précédents)
Si l'utilisateur a plus de 18 ans, affichez vous êtes majeur. S'il a moins de 18 ans, "vous êtes mineur". 





***Les conditions en javascript peuvent être placées dans une fonction qui s'executera d'une forme ou d'une autre par exemple en réponse à un événement, un calcul... 
Vous pouvez utiliser if (maVariable>100) {...} else

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


