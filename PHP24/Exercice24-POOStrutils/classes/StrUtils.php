<?php
class StrUtils {
    // Propriété privée pour stocker la chaîne de caractères
    private $str;

    // Constructeur pour initialiser la propriété str
    public function __construct($str) {
        $this->str = $str;
    }

    // Méthode pour mettre en gras
    public function bold() {
        return '<strong>' . $this->str . '</strong>';
    }

    // Méthode pour mettre en italique
    public function italic() {
        return '<em>' . $this->str . '</em>';
    }

    // Méthode pour souligner
    public function underline() {
        return '<u>' . $this->str . '</u>';
    }

    // Méthode pour capitaliser
    public function capitalize() {
        return ucwords($this->str);
    }

    // Méthode pour appliquer du gras, de l'italique et du souligné
    public function uglify() {
        return $this->bold() . ' ' . $this->italic() . ' ' . $this->underline() ;
    }
}
