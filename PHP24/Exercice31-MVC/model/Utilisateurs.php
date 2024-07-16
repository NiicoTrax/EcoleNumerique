<?php

class Utilisateurs {

    private $userLists;

    public function __construct() {
        $this->userLists = array("Brian", "Sebastien", "Michel", "Robert", "Bertrand");
    }

    public function getAll() {
        // Votre code ici
        return $this->userLists;
    }

    public function create() {
        // Votre code ici pour ajouter un utilisateur
        $newUser = "Utilisateur" . rand(1000, 9999); 
        array_push($this->userLists, $newUser);
    }

    public function delete($index) {
        // Votre code ici pour supprimer un utilisateur
        if ($this->checkLength($index)) {
            unset($this->userLists[$index]);
           
            $this->userLists = array_values($this->userLists);
            return true;
        } else {
            return false;
        }
    }

    private function checkLength($index) {
        if ($index < count($this->userLists)) {
            return true;
        } else {
            return false;
        }
    }
}
?>
