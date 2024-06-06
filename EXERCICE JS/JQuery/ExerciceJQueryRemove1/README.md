Consignes :

- Créer le code jQuery approprié pour supprimer l'élément <div>




 Théorie :

 jQuery permet de supprimer des éléments html de façon plus pratique qu'en javascript natif.

 Pour supprimer un élément en javascript, il faut utiliser <parentElement>.removeChild(element)
 jQuery offre une méthode beaucoup plus pratique : remove()

 remove() supprime directement l'élément selectionné sans avoir à faire référence à l'élément parent ( à son conteneur )

 Une deuxieme méthode , empty() supprime uniquement les éléments enfants d'un conteneur.

 Exemple : remove()

 $("#div1").remove();

 Cette ligne supprimera l'élément ayant pour id "div1"


 Exemple : empty()

 $("#div1").empty();

 Cette ligne supprime les éléments contenu dans le div ayant pour id "div1"

 En javascript natif, on pourrait faire document.getElementById('div1').innerHTML = "" ou parcourir dans une boucle
 tout les éléments enfants du conteneur et utiliser un removeChild sur chaque élément dans la boucle



 - La méthode remove() supporte également un filtre en parametre ce qui permet de supprimer les éléments de façon plus
 précises.

 Exemples :

 - Supprimer tout les éléments <p> ayant pour classe "test"

 $("p").remove(".test");


 - Supprimer tout les éléments <p> ayant pour classe "test" ou "demo"

  $("p").remove(".test, .demo");
