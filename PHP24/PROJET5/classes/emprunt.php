<?php

class Emprunt {
    private $idEmprunt;
    private $idLivre;
    private $idMembre;
    private $dateEmprunt;
    private $dateRetour;

    // Constructor to initialize the loan object with given parameters
    public function __construct($idEmprunt, $idLivre, $idMembre, $dateEmprunt, $dateRetour) {
        $this->idEmprunt = $idEmprunt;
        $this->idLivre = $idLivre;
        $this->idMembre = $idMembre;
        $this->dateEmprunt = $dateEmprunt;
        $this->dateRetour = $dateRetour;
    }

    // Getter method for loan ID
    public function getIdEmprunt() {
        return $this->idEmprunt;
    }

    // Getter method for book ID
    public function getIdLivre() {
        return $this->idLivre;
    }

    // Getter method for member ID
    public function getIdMembre() {
        return $this->idMembre;
    }

    // Getter method for loan date
    public function getDateEmprunt() {
        return $this->dateEmprunt;
    }

    // Getter method for return date
    public function getDateRetour() {
        return $this->dateRetour;
    }

    // Setter method for loan ID
    public function setIdEmprunt($idEmprunt) {
        $this->idEmprunt = $idEmprunt;
    }

    // Setter method for book ID
    public function setIdLivre($idLivre) {
        $this->idLivre = $idLivre;
    }

    // Setter method for member ID
    public function setIdMembre($idMembre) {
        $this->idMembre = $idMembre;
    }

    // Setter method for loan date
    public function setDateEmprunt($dateEmprunt) {
        $this->dateEmprunt = $dateEmprunt;
    }

    // Setter method for return date
    public function setDateRetour($dateRetour) {
        $this->dateRetour = $dateRetour;
    }
}
?>
