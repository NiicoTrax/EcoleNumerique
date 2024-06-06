Consignes :

- Créer le code jQuery approprié pour alterner entre déroulage/enroulage du div lors du click sur le bouton
, l'animation doit durer 1 seconde.




 Théorie :

 jQuery permet d'animer un élément afin qu'il se "déroule" progressivement.



 Voici les différentes méthodes disponibles :


    slideDown()
    slideUp()
    slideToggle()

Toutes ces méthodes acceptent en parametre la durée de l'animation et une fonction de retour qui s'éxécute lorsque
l'animation est terminée.

- La méthode slideDown() permet de dérouler progressivement vers le bas un élément masqué ou transparent ( si votre élément est masqué
en css en utilisant display:none par exemple, jQuery va modifier la propriété automatiquement ! ) , Exemple :

$("#div3").slideDown(3000);

L'élément ayant pour id "div3" va progressivement être déroulé vers le bas, l'animation va durer 3 secondes ( = 3000 millisecondes )


- La méthode slideUp() permet "d'enrouler" progressivement vers le haut un élément visible, exemple :

$("#div3").slideUp(3000);


- La méthode slideToggle permet de dérouler ou d'enrouler progressivement un élément, jQuery choisira en fonction de l'état actuel
de l'élément ( si l'élément n'est pas visible => slideDown, si l'élément est visible => slideUp), exemple :

$("#div3").slideToggle(3000);


