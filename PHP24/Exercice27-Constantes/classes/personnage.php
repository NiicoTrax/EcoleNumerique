<?php

// Ma classe s'appelle personnage
class personnage {

    // La propriété id a été modifié pour passer de private à protected, je ne peux pas la modifier ou la lire directement en dehors de cette classe
    // Mais les classes enfants vont hériter de cette propriété
    // - private $id;
    // + protected $id;
    protected $id;
    protected $nom;
    protected $vie;
    public $x;
    public $y; 

    const DEGATS_MIN = 1;

    // J'ajoute une propriété statique à ma classe personnage
    protected static $numInstances = 0; // Initialisation de la propriété

    // Constructeur de ma classe permettant de définir des valeurs par défaut lorsqu'elle est instanciée
    public function __construct()
    {
        $this->setNom("Nom par défaut");
        $this->x = 0;
        $this->y = 0;
        $this->vie = 100;
        self::$numInstances++; // Incrémentation du compteur d'instances
    }

    // Méthode pour récupérer le nombre d'instances
    public static function getNumInstances()
    {
        return self::$numInstances; // Récupérer le nombre d'instances
    }

    // Méthode permettant de déplacer le personnage vers la droite
    public function walkRight()
    {
        $this->x+=1;

    }

    // Setter permettant de définir l'attribut privé id
    public function setId($id)
    {
        $this->id = $id;
    }

    // Getter permettant de retourner l'attribut privé id
    public function getId()
    {
        return $this->id;
    }

    // Setter permettant de définir l'attribut protégé nom
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    // Getter permettant de retourner l'attribut protégé nom
    public function getNom()
    {
        return $this->nom;
    }

    /*
    *****
        * Une méthode "attack" qui génére un nombre aléatoire compris entre 0 et 5
        * Si le résultat stocké dans la variable $degats est inférieur à 1, alors $degats aura pour valeur la constante
        * DEGATS_MIN
    *****
    */

    public function attack()
    {
        $degats = mt_rand(0,5);
        if($degats<self::DEGATS_MIN)
        {
            $degats = self::DEGATS_MIN;
        }
        return $degats;
    }
}
?>
