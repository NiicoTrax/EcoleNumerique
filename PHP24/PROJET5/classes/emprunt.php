<?php

class Emprunt {
    private $idEmprunt;
    private $idLivre;
    private $idMembre;
    private $dateEmprunt;
    private $dateRetour;

    public function __construct($idEmprunt, $idLivre, $idMembre, $dateEmprunt, $dateRetour) {
        $this->idEmprunt = $idEmprunt;
        $this->idLivre = $idLivre;
        $this->idMembre = $idMembre;
        $this->dateEmprunt = $dateEmprunt;
        $this->dateRetour = $dateRetour;
    }

    public function getIdEmprunt() {
        return $this->idEmprunt;
    }

    public function getIdLivre() {
        return $this->idLivre;
    }

    public function getIdMembre() {
        return $this->idMembre;
    }

    public function getDateEmprunt() {
        return $this->dateEmprunt;
    }

    public function getDateRetour() {
        return $this->dateRetour;
    }

    public function setIdEmprunt($idEmprunt) {
        $this->idEmprunt = $idEmprunt;
    }

    public function setIdLivre($idLivre) {
        $this->idLivre = $idLivre;
    }

    public function setIdMembre($idMembre) {
        $this->idMembre = $idMembre;
    }

    public function setDateEmprunt($dateEmprunt) {
        $this->dateEmprunt = $dateEmprunt;
    }

    public function setDateRetour($dateRetour) {
        $this->dateRetour = $dateRetour;
    }
}
?>
