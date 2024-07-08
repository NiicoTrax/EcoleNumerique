<?php

require_once 'personnage.php';

class Sorcier extends Personnage {
    public function __construct($nom) {
        parent::__construct($nom);
        $this->x = 125;
        $this->y = 125;
    }
}
?>
