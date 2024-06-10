<?php

// Première ligne
function maFonction() { 
    echo "Hello World!";
}

// Deuxième ligne
maFonction(); 

echo "<br><br>";

// Troisième ligne
function maFonctionParam($fname, $lname) {
    echo $fname;
    return $lname; 
}

echo maFonctionParam("John", "Doe");

?>
