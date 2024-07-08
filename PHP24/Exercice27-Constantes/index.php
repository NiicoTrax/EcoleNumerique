<?php


// J'inclue mes deux classes ici, faites bien attention à l'ordre d'inclusion, comme la classe dragon hérite de la classe
// personnage, je dois inclure la classe personnage avant d'inclure la classe dragon

require"classes/personnage.php";
require"classes/dragon.php";
require"classes/princesse.php";
require"classes/sorcier.php";

// Creation d'une instance de la classe personnage
$humain = new personnage();
$humain->setNom("Votre nom");

// Creation d'une instance de la classe dragon
$dragon = new dragon();
$dragon->setNom("");

// Creation d'une instance de princesse
$princesse = new princesse();

// Creation d'ne instance de sorcier
$sorcier = new sorcier();

echo "Nombre d'instances de Personnage : " . personnage::getNumInstances() . "<br>";

 ////AFFICHER LE NB DE DRAGONS (PROPRIETE STATIQUE $numInstances PUIS INCREMENTATION DANS CONSTRUCT PERSONNAGES  self::$numInstances++; PUIS FUNCTION getNumIntances() POUR RECUPERER VALEUR)

//AFFICHER LE NB DE DRAGONS (PROPRIETE STATIQUE $numDragons PUIS INCREMENTATION DANS CONSTRUCT PERSONNAGES  self::$numDragonss++; PUIS FUNCTION getNumDragons() POUR RECUPERER VALEUR)
echo "Nombre de dragons créés : " . dragon::getNumDragons() . "<br>";


