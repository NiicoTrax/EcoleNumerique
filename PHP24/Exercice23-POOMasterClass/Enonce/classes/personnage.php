<?php

// Ma classe s'apelle personnage
class personnage {

    // La propriété id est privée, je ne peux pas la modifier ou la lire directement en dehors de cette classe
    private $id;

    // Constructeur de ma classe permettant de définir des valeurs par défaut lorsqu'elle est instanciée
    public function __construct()
    {
        $this->nom = "Nom par défaut";
        $this->x = 0;
        $this->y = 0;
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
} 