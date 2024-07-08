<?php
require 'classes/personnage.php';
require 'classes/dragon.php';
require 'classes/princesse.php';

$humain = new Personnage();
$humain->setNom("Nicolas");
echo "Nom du personnage : " . $humain->getNom() . "<br/>";
echo "Vie du personnage : " . $humain->getVie() . "<br/>";

$dragon = new Dragon();
echo "Nom du dragon : " . $dragon->getNom() . "<br/>";
echo "Vie du dragon : " . $dragon->getVie() . "<br/>";

$princesse = new Princesse();
echo "Nom de la princesse : " . $princesse->getNom() . "<br/>";
echo "Vie de la princesse : " . $princesse->getVie() . "<br/>";
?>
