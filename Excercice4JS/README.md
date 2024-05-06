Exercice 4 :


    Consignes

    - Modifier le script pour afficher tout les éléments ( "myDiv2" et "myDiv3" )



    Théorie

    En javascript, il existe de nombreuses fonctions pour manipuler les éléments html.
    Dans cet exercice, nous utilisons document.getElementById().innerHTML

    Cette ligne de code peut se décomposer en trois parties :

    - document

    document est un objet javacript qui représente l'intégralité de la page web sur laquelle le javascript est éxécuté


    - getElementById

    getElementById est une méthode de l'objet document, il permet de cibler un élément html grâce à son attribut ID


    - innerHTML

    innerHTML est une propriété de l'élément html selectionné, dans cet exercice, nous attribuons une valeur à cette
    propriété, mais il est possible d'accéder à cette propriété en lecture en supprimant la partie ="mon Texte"


    Javascript accepte les " ou ' lorsqu'il s'agit de délimiter une chaine de caracteres ( dans notre exemple, si les "
     sont retirés dans getElementById("myDiv") et que nous écrivons getElementById(mydiv) alors javascript utilisera la
     variable myDiv, si celle ci n'existe pas, le script produira une erreur.