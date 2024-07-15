<?php

class Membre {
    private $id;
    private $nom;
    private $email;
    private $dateAdhesion;

    // Constructor to initialize the member object with given parameters
    public function __construct($id, $nom, $email, $dateAdhesion) {
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->dateAdhesion = $dateAdhesion;
    }

    // Getter method for member ID
    public function getId() {
        return $this->id;
    }

    // Getter method for member name
    public function getNom() {
        return $this->nom;
    }

    // Getter method for member email
    public function getEmail() {
        return $this->email;
    }

    // Getter method for member joining date
    public function getDateAdhesion() {
        return $this->dateAdhesion;
    }

    // Setter method for member ID
    public function setId($id) {
        $this->id = $id;
    }

    // Setter method for member name
    public function setNom($nom) {
        $this->nom = $nom;
    }

    // Setter method for member email
    public function setEmail($email) {
        $this->email = $email;
    }

    // Setter method for member joining date
    public function setDateAdhesion($dateAdhesion) {
        $this->dateAdhesion = $dateAdhesion;
    }
}
?>
