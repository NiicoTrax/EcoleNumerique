<?php


class princesse extends personnage //POUR HERITER DE L ELEMENT PERSONNAGE
{
    private $saved; //AJOUTER UNE NOUVELLE PROPRIETE


        public function __construct(){
            $this->saved= 0;//CONSTRUIRE POUR DONNER UNE VALEUR A CETTE PROPRIETE
            $this->x=450;//COMME ENFANT DE PERSONNAGE JUSTE REDEFINI X ET Y
            $this->y=450;

}
}
