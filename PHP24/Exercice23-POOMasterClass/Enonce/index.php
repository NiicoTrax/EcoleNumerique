<?php

require_once 'classes/personnage.php';

// Création d'une instance de la classe Personnage
$perso = new Personnage('John Doe');

// Utilisation des méthodes getter et setter pour accéder à la propriété nom
echo 'Nom du personnage : ' . $perso->getNom() . '<br>';

// Modifier le nom du personnage
$perso->setNom('Jane Doe');
echo 'Nom du personnage modifié : ' . $perso->getNom() . '<br>';

// Déplacement du personnage
$perso->walkLeft();
$perso->walkTop();
$perso->walkBottom();

// Affichage de la position actuelle du personnage (facultatif)
echo 'Position X : ' . $perso->getPositionX() . '<br>';
echo 'Position Y : ' . $perso->getPositionY() . '<br>';

?>
