<?php
// Vérification de l'existence de la classe pour éviter les redéclarations
if (!class_exists('Personnage')) {
    class Personnage {
        protected $id;
        protected $nom;
        protected $vie = 50; // Ajout de la propriété vie initialisée à 50

        public function __construct() {
            $this->setNom("Nom par défaut");
            $this->x = 0;
            $this->y = 0;
        }

        public function walkRight() {
            $this->x += 1;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getId() {
            return $this->id;
        }

        public function setNom($nom) {
            $this->nom = $nom;
        }

        public function getNom() {
            return $this->nom;
        }

        public function getVie() {
            return $this->vie;
        }
    }
}
?>
