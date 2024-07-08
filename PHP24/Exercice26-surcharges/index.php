<?php


// J'inclue mes deux classes ici, faites bien attention à l'ordre d'inclusion, comme la classe dragon hérite de la classe
// personnage, je dois inclure la classe personnage avant d'inclure la classe dragon

require "classes/personnage.php";
require "classes/dragon.php";
require "classes/princesse.php";//NE PAS OUBLIER DE LES INCLURE DANS LE FICHIER POUR LES LIER
require "classes/sorcier.php";

// Creation d'une instance de la classe personnage
$humain = new personnage();
 $humain->setNom("Roberto");
 echo $humain->getNom();
echo $humain->getVie();

echo "<br><br>";

// Création d'une instance de Princesse avec un argument
$princesse = new Princesse('Aurore');  // Constructeur avec argument

// Création d'une instance de Sorcier avec un argument
$sorcier = new Sorcier('Gandalf');  // Constructeur avec argument

// Afficher les valeurs des instances
echo 'Princesse: ' . $princesse->nom . ', x: ' . $princesse->x . ', y: ' . $princesse->y . '<br>';
echo 'Sorcier: ' . $sorcier->nom . ', x: ' . $sorcier->x . ', y: ' . $sorcier->y . '<br>';










