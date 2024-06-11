<?php


// Premiere ligne

echo"Un fichier php va être inclu à la suite de ce texte ...<br><br>";

    // inclure fichier texte.php ci dessous
    include 'texte.php';

// Deuxieme Ligne ( inclure fichiers vars.php ci dessous )

    require 'vars.php';

echo"J'aime également les ".$maVar;






