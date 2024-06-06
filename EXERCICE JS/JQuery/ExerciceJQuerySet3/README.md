Consignes :

- Créer le code jQuery approprié pour remplacer la valeur du champ input par "Tim Berners-Lee".




 Théorie :

 jQuery dipose de méthodes pour modifier ou récuperer les valeurs de nos éléments html.

 Il s'agit en réalité de réécriture de méthodes javascript natives ( innerHTML, value , innerText ) :

 - text()
 Equivalent à innerText ( plus ou moins ) , permet de récuperer ou de modifier le contenu textuel d'un élément html

 - html()
 Equivalent à innerHTML , permet de récuperer ou de modifier le contenu html d'un élément html

 - val()
 Equivalent à value, permet de récuperer ou de modifier la valeur d'un élément html ( champs input d'un formulaire )

  Exemples :

    $("#btn1").click(function(){
        $("#test1").text("Hello world!");
    });
    $("#btn2").click(function(){
        $("#test2").html("<b>Hello world!</b>");
    });
    $("#btn3").click(function(){
        $("#test3").val("Dolly Duck");
    });

    Pour assigner une valeur à nos méthodes text,html ou val, il suffit de les placer en parametres, comme en javascript
    natif, on utilisera les "" pour une chaine de caracteres ou une variable pour insérer directement la valeur de notre
    variable.


  - On peut également récuperer ou assigner la valeur d'un Attribut html avec la méthode suivante :

  attr()
  Equivalent à getAttribute/setAttribute en javascript natif

  Exemple :

  $("#monLien").attr("href", "https://take-off.tech/");

  Je modifie la valeur de la propriété href de l'élément ayant pour id "monLien"


  Equivalent en javascript natif :

  document.getElementById('monLien').setAttribute("href","https://take-off.tech/");








