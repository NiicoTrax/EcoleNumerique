Consignes :

- L'élément <p> est masqué sur la page, utiliser la méthode jQuery appropriée pour afficher l'élément <p> lors du click
sur le bouton.




 Théorie :

 jQuery propose des méthodes trés pratiques pour masquer ou afficher des éléments html, exemple :

 $("#hide").click(function(){
     $("p").hide();
 });

 $("#show").click(function(){
     $("p").show();
 });

 Dans cet exemple, lorsque l'élément ayant pour id "hide" est cliqué, tout les éléments <p> sur la page vont être masqués.
 Lorsque l'élément ayant pour id "show" est cliqué, tout les éléments <p> vont être affichés.


 Encore plus fort, les méthodes hide et show acceptent deux parametres : le premier est la durée d'animation pour masquer/afficher,
 le second est une fonction de callback qui sera appelé lorsqu'un ou des éléments ont terminé de s'afficher ou d'être masqué.

 La syntaxe est la suivante : $(selector).hide(speed,callback);

 Exemple :

 $("p").hide(1000, function() { alert('ok'); } );

 Va masquer tout les éléments <p> au bout d'une seconde ( 1000 millisecondes ) puis affichera une boite d'alerte à l'utilisateur
 lorsque les éléments seront masqués ( soit au bout d'une seconde dans notre exemple ).



 Il est également possible d'utiliser la méthode toggle, cette méthode est trés pratique car elle masque ou affiche
 l'élément concerné en fonction de son état ( si l'élément est masqué, toggle affichera l'élément, si l'élément est affiché,
 toggle masquera l'élément )

 Exemple :

 $("p").toggle();

 La méthode toggle peut également utiliser les mêmes parametres que les méthodes hide et show ( durée d'animation et
 fonction de callback )
