Exercice 3 :

    - Créer une fonction ayant pour nom txtInsert
    - Cette fonction doit retourner le texte suivant : "J'aime le Javascript"
    - Créer une deuxieme fonction ayant pour nom backgroundSet
    - Cette fonction doit retourner le texte suivant : "magenta"

    - Tester la page dans le navigateur avant de mettre en place le code puis une fois que celui ci a été mis en place.


Théorie :

    En javascript, les fonctions sont un ensemble d'instructions pouvant être appelé à tout moment.

    Les fonctions acceptent des parametres, ils sont optionels, si j'apelle ma fonction sans parametres, celle ci
    s'éxécutera quand même.

    Pour executer une fonction, il me suffit d'y faire référence dans mon programme comme ceci :
    <nomDeMaFonction>();

    ( Remplacer <nomDeMaFonction> par le nom de votre fonction


    Une fonction est définie en utilisant l'instruction "function" suivie du nom de ma fonction et de () contenant
     les parametres de ma fonction séparé par une virgule ( ceux ci ne sont pas obligatoire )

     Exemples :

     function maFonction()
     {
        //Code js à executer
     }

     Ici ma fonction n'a pas de parametres.

     function maFonction(param1, param2, param3)
     {
        //Code js à executer
     }

     Ici ma fonction accepte trois parametres
     A l'intérieur de ma fonction, mes parametres vont se comporter comme des variables, ils ne seront utilisable qu'a
     l'intérieur de ma fonction.



     L'instruction "return" plaçé à l'intérieur de ma foncton va retourner une valeur définie et stopper l'execution de *
     ma fonction.

     Tout code plaçé aprés return dans ma fonction ne sera donc pas executé.


     En utilisant return, il est donc possible d'utiliser une fonction comme une variable, exemple :

      function maFonction()
      {
      var maVariable = 42;
      return maVariable;
      }

      var uneAutreVariable = maFonction();

      Ici ma variable uneAutreVariable aura pour valeur 42.

      Je ne peux pas utiliser maVariable en dehors de ma fonction car celle ci est locale, elle n'existe qu'à
      l'interieur de ma fonction.