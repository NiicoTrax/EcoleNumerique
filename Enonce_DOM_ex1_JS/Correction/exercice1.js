

var monDiv = document.createElement('div');

document.getElementById('viewport').appendChild(monDiv);

monDiv.innerHTML = "Ce div a été ajouté en utilisant du javascript";



var MonDeuxiemeDiv = document.createElement('div');

document.getElementById('viewport').appendChild(MonDeuxiemeDiv);

MonDeuxiemeDiv.style.backgroundColor = 'red';

MonDeuxiemeDiv.style.width = '100px';

MonDeuxiemeDiv.style.height = '100px';



var Supprime = document.getElementById('aSupprimer');

document.getElementById('viewport').removeChild(Supprime);

