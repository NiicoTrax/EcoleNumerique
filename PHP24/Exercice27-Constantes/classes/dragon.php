<?php

// La classe dragon hérite de ma classe personnage
require_once 'personnage.php';

class dragon extends personnage {

    protected static $numDragons = 0; // Créer une variable statique pour compter le nombre de dragons

    public function __construct()
    {
        parent::__construct(); // Appel du constructeur parent
        $this->setId(rand(1,99999));

        // Je souhaite également que les propriétés x et y soient définies aléatoirement pour chaque instance dragon
        $this->x = rand(1,900);
        $this->y = rand(1,900);

        $this->vie = 100;

        self::$numDragons++; // Incrémentation de la variable
    }

    // Je redéfini la méthode héritée setNom
    public function setNom($nom)
    {
        $this->nom = "Dragon ".$this->id;
    }

    // J'ajoute une méthode cracheFeu, pour le moment cette méthode ne fait rien du tout
    public function cracheFeu()
    {

    }

    public static function getNumDragons()
    {
        return self::$numDragons; // Récupérer le nombre de dragons
    }
}
?>
