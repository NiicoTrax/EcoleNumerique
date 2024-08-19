Consignes :

- Créer le code jQuery approprié pour afficher dans une boite d'alerte le contenu textuel de l'élément <p>.




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
      alert("Text: " + $("#test").text());
  });
  $("#btn2").click(function(){
      alert("HTML: " + $("#test").html());
  });

  Récuperer du contenu textuel ou du contenu html d'un élément ( ici l'élément ayant pour id test )


  $("#btn1").click(function(){
      alert("Value: " + $("#test").val());
  });

  Récuperer la valeur d'un champs de formulaire



  - On peut également récuperer ou assigner la valeur d'un Attribut html avec la méthode suivante :

  attr()
  Equivalent à getAttribute/setAttribute en javascript natif

  Exemple :

  alert($("#test").attr("href"));

  Récuperation de l'attribut href d'un élément html ( ici un élément <a> )






