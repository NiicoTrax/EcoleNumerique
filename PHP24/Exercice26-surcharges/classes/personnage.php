<?php


// Ma classe s'apelle personnage
class personnage {

    // La propriété id a été modifié pour passer de private à protected, je ne peux pas la modifier ou la lire directement en dehors de cette classe
    // Mais les classes enfants vont hériter de cette propriété
    // - private $id;
    // + protected $id;
    protected $id;
    protected $nom;
    protected $vie;//CREATION DE LA VARIABLE VIE EN PROTEGE

    protected $x;
    protected $y;

    // Constructeur de ma classe permettant de définir des valeurs par défaut lorsqu'elle est instanciée
    public function __construct()
    {
        $this->setNom("Nom par défaut");
        $this->x = 0;
        $this->y = 0;
        $this->vie=50;//DEFINITION DE LA VALEUR VIE DANS LE CONSTRUCTEUR

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

    
    
    // RETOURNER L ATTRIBUT PROTEGE VIE
    public function getVie(){
       return $this->vie;
    }

  
    // MODIFIER LA VIE DANS LA CLASSE DRAGON 
    public function setVie($vie)
    {
        $this->vie = $vie;
    }



   


}