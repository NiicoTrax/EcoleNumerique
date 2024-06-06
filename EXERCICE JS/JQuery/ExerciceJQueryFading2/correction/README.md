Consignes :

- Créer le code jQuery approprié pour masquer progressivement le div, l'effet doit durer 5 secondes.




 Théorie :

 jQuery permet d'animer l'opacité d'un élément html, c'est une autre façon d'afficher ou de masquer progressivement
 des éléments.

 Voici les différentes méthodes disponibles :


    fadeIn()
    fadeOut()
    fadeToggle()
    fadeTo()

Toutes ces méthodes acceptent en parametre la durée de l'animation et une fonction de retour qui s'éxécute lorsque
l'animation est terminée.

- La méthode fadeIn permet d'afficher progressivement un élément masqué ou transparent ( si votre élément est masqué
en css en utilisant display:none par exemple, jQuery va modifier la propriété automatiquement ! ) , Exemple :

$("#div3").fadeIn(3000);

L'élément ayant pour id "div3" va s'afficher progressivement, l'animation va durer 3 secondes ( = 3000 millisecondes )


- La méthode fadeOut permet de masquer progressivement un élément visible, exemple :

$("#div3").fadeOut(3000);


- La méthode fadeToggle permet de masquer ou d'afficher progressivement un élément, jQuery choisira en fonction de l'état actuel
de l'élément ( si l'élément n'est pas visible => fadeIn, si l'élément est visible => fadeOut ), exemple :

$("#div3").fadeToggle(3000);


- La méthode fadeTo permet de définir l'opacité d'un élément de façon précise tout en animant la propriété, exemple :

$("#div2").fadeTo(3000, 0.4);

L'élément ayant pour id "div2" va voir son opacité définie progressivement à 0.4 , l'animation va durer 3 secondes.

