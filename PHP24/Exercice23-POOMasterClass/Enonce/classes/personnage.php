<?php

// Ma classe s'apelle personnage
class personnage {

    // La propriété id est privée, je ne peux pas la modifier ou la lire directement en dehors de cette classe
    private $id;

    private $nom;
    private $positionX;
    private $positionY;

    // Constructeur de ma classe permettant de définir des valeurs par défaut lorsqu'elle est instanciée
    
    public function __construct($nom, $positionX = 0, $positionY = 0) {
        $this->nom = $nom;
        $this->positionX = $positionX;
        $this->positionY = $positionY;
    }


    // Méthode permettant de déplacer le personnage vers la droite
    public function walkRight()
    {
        $this->x+=1;

    }

     // Méthode pour déplacer le personnage vers la gauche
     public function walkLeft() {
        $this->positionX -= 1;
    }

    // Méthode pour déplacer le personnage vers le haut
    public function walkTop() {
        $this->positionY += 1;
    }

    // Méthode pour déplacer le personnage vers le bas
    public function walkBottom() {
        $this->positionY -= 1;
    }

    // Méthodes pour obtenir la position actuelle (facultatif pour vérification)
    public function getPositionX() {
        return $this->positionX;
    }

    public function getPositionY() {
        return $this->positionY;
    }

    // Setter permettant de définir l'attribut privé id
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    // Getter permettant de retourner l'attribut privé id
    public function getId()
    {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }
} 
