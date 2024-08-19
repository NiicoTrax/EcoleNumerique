Consignes :

- Utiliser la méthode css() de jQuery pour ajouter une bordure rouge de 5px "dotted"




 Théorie :

 jQuery offre une méthode pour manipuler directement le css d'un élément ( lire ou ecrire des propriétés )
 Cette méthode s'appelle : css()

 - Pour retourner une propriété css d'un élément, on utilisera la méthode de cette façon :

 css("nom de la propriété");

 Exemple :

 $("p").css("background-color");

 Cette instruction retournera la propriété css background-color


 - Pour définir une propriété css, on utilisera la méthode de cette façon :

 css("nom de la propriété","valeur");


Exemple :

 $("p").css("background-color", "yellow");


Ici nous définissons la propriété css background-color sur "yellow" , le fond de notre élément sera donc jaune.


- Pour définir plusieurs propriétés css en une seule fois, on procéde de cette façon :

css(
    {"nom de la propriété":"valeur",
    "nom de la propriété":"valeur",
     etc...}
     );


Exemple :

$("p").css({"background-color": "yellow", "font-size": "200%"});

Ici le ou les éléments <p> auront tous deux propriétés css : background-oolor défini à "yellow" et font-size défini à
"200%"


