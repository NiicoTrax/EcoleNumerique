Consignes :

- Créer le code jQuery approprié pour déplacer progressivement le div de 250 pixels vers la droite.




 Théorie :

 jQuery dipose d'une méthode permettant de réaliser des animations personalisées en javascript trés facilement.

 Cette méthode s'apelle animate()

 On l'écrit de cette façon : $(selector).animate({params},speed,callback);

 selector = l'élément html que l'on va animer
 params = une liste de propriétés css que l'on va animer
 speed = la durée de l'animation
 callback = une fonction optionelle qui sera appelée lorsque l'animation sera terminée

 Exemple :

 $("button").click(function(){
     $("div").animate({left: '250px'});
 });

 Dans cet exemple, lors du click sur le bouton, l'élément div va être animé, sa propriété left va progressivement être
 définie à 250 pixels.

 Souvenez vous que pour animer un élément html en javascript, celui ci doit avoir une position définie en css
 ( absolute, relative etc... )


 - Il est possible d'animer plusieurs propriétés css en une seule animation, exemple :

 $("button").click(function(){
     $("div").animate({
         left: '250px',
         opacity: '0.5',
         height: '150px',
         width: '150px'
     });
 });

 Dans cet exemple, les propriétés left, height, width et l'opacité de mon div seront animés en même temps.


 - Il est possible d'utiliser des valeurs relatives pour animer les propriétés css, exemple :

 $("button").click(function(){
     $("div").animate({
         left: '250px',
         height: '+=150px',
         width: '+=150px'
     });
 });

 Dans cet exemple, les propriétés height et width de mon div vont être animé , les valeurs de hauteur et largeur seront
 égales aux valeurs définie en css pour le div +150


 - jQuery supporte la mise en file d'attente, il est ainsi possible de spécifier différentes animations qui vont s'éxécuter
 l'une aprés l'autre ( une fois qu'une animation est terminée, on passe à la ligne suivante ), exemple :


$("button").click(function(){
    var div = $("div");
    div.animate({left: '100px'}, "slow");
    div.animate({fontSize: '3em'}, "slow");
});

Dans cet exemple , le div est d'abord déplaçé progressivement de 100 pixels vers la gauche.
Une fois l'animation terminée, sa taille de police est ensuite animée.
