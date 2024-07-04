<?php

include"classes/personnage.php";

// Creation d'une instance de la classe personnage
$perso = new personnage();

echo $perso->nom;

echo"<br><br>";



$perso2 = new personnage();
$perso2->nom = "Robert";
echo $perso2->nom;



$perso->walkRight();
$perso->walkRight();
$perso->walkRight();
$perso->walkRight();
