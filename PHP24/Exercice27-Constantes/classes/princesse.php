<?php


class princesse extends personnage
{

    private $saved;

    public function __construct()
    {
        // Surcharge de la méthode construct, on éxécute celle de la classe parent puis on redéfini les propriétés qui
        // sont différentes par rapport à la classe mere.
        parent::__construct();

        // Définition des propriétés propre à cette classe
        $this->saved = 0;
        $this->x = 450;
        $this->y = 450;
    }


} 