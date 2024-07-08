<?php
require 'personnage.php';

class Princesse extends Personnage {
    private $saved = false;
    protected $x = 450;
    protected $y = 450;

    public function __construct() {
        parent::__construct();
    }
}
?>
