Consignes :

- Dans le fichier exercice1.js , remplacer
 "selecteur" par la balise appropriée pour 
 masquer n'importe quel élément <p>
lorsque l'utilisateur click sur celui ci.

remplacer également "event" pour capturer
 le click sur l'élément

 La méthode hide() de jQuery permet de masquer 
 un élément html.




 Théorie :

 Comme en javascript vanilla, vous allez 
 pouvoir capturer des événements avec jQuery.

 - Voici par exemple l'équivalent d'un événement 
 click avec jQuery :

 $("#test").click(function(){
   // votre code ici
 });

 Ici, nous allons écouter le click sur 
 l'élément ayant pour id "test"


 Un autre événement fréquemment utilisé permet 
 d'écouter le chargement complet de la page html :

 $(document).ready(function() {

 });

 Il est nécessaire de l'utiliser si vous devez 
 placer votre script js dans le <head>


 - Exemple : capture de l'événement double click

  $("#test").dblclick(function(){
    // votre code ici
  });


- Exemple : capture de l'événement mouse over 
( se déclenche lorsque l'utilisateur survole 
l'élément html défini )


  $("#test").hover(function(){
    // votre code ici
  });

- Exemple: capture de l'événement focus qui 
permet d'éxécuter du code lorsqu'un champ de 
formulaire est selectionné
  par l'utilisateur

  $("input").focus(function(){
      //code
  });

- Exemple: capture de l'événement blur qui 
permet d'éxécuter du code lorsqu'un champ de 
formulaire perds le focus
    par l'utilisateur

    $("input").blur(function(){
        //code
    });


- Il est possible d'attacher plusieurs 
écouteurs d'événement à un élément html :

$("#test").on({
    hover: function(){
        //du code
    },
    click: function(){
        //du code différent
    }
});

ici l'élément ayant pour id "test" va réagir 
à la fois au passage de la souris sur l'élément
 et au click , le code est différent
pour chaque événement mais l'élément n'est 
sélectionné qu'une seule fois

On associe plusieurs événements à un élément 
en utilisant "on"



D'autres événements :

- mouseenter ( l'événement se déclenche 
lorsque le pointeur de la souris commence 
à survoler l'élément )
- mouseleave ( l'événement se déclenche
 lorsque le pointeur de la souris est déplaçé 
 en dehors de l'élément )



