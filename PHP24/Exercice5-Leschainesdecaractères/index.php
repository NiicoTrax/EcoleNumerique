<?php

// Compléter le code ci-dessous pour afficher la longueur de la chaîne de caractères
echo strlen("google");

echo "<br><br>"; // Décommentez les <br> pour tester l'affichage lorsque vous aurez plusieurs instructions

// Compléter le code ci-dessous pour inverser la chaîne de caractères
echo strrev("anticonstitutionnellement");

echo "<br><br>";

// Et si vous testiez également avec votre prénom ?
echo strrev("Nicolas");

echo "<br><br>";

// Compléter le code ci-dessous pour remplacer le mot ok par non
$oldtxt = "Ok Google!";
$newtxt = str_replace("Ok", "non", $oldtxt);

echo $newtxt;

?>
