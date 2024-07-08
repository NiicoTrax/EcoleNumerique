<?php
require_once 'trait1.php';
require_once 'trait2.php';

class maClass {
    use Trait1, Trait2;
}

// Test de la classe
$test = new maClass();
?>