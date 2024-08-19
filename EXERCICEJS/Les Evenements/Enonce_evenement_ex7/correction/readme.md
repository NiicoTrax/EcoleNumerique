# Exercices JavaScript

**IMPORTANT**

Vérifiez votre code dans le navigateur. Vous pouvez aussi vérifier dans la console. 

## Exercice 7 :

Demander à l’utilisateur sa pointure et son année de naissance. Créer une fonction qui fait les calculs suivants :

1. Multiplier la pointure par 2
2. Ajouter 5 au résultat
3. Multiplier le tout par 50
4. Soustraire l’année de naissance
5. Ajouter au tout 1766

La fonction doit retourner le résultat.
Tester avec votre date de naissance et votre pointure. 

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