<?php

class Membre {
    private $id;
    private $nom;
    private $email;
    private $dateAdhesion;

    public function __construct($id, $nom, $email, $dateAdhesion) {
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->dateAdhesion = $dateAdhesion;
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getDateAdhesion() {
        return $this->dateAdhesion;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setDateAdhesion($dateAdhesion) {
        $this->dateAdhesion = $dateAdhesion;
    }
}
?>
