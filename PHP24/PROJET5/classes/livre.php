<?php

class Livre {
    private $isbn;
    private $titre;
    private $auteur;
    private $anneePublication;
    private $genre;

    public function __construct($isbn, $titre, $auteur, $anneePublication, $genre) {
        $this->isbn = $isbn;
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->anneePublication = $anneePublication;
        $this->genre = $genre;
    }

    public function getIsbn() {
        return $this->isbn;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function getAuteur() {
        return $this->auteur;
    }

    public function getAnneePublication() {
        return $this->anneePublication;
    }

    public function getGenre() {
        return $this->genre;
    }

    public function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function setAuteur($auteur) {
        $this->auteur = $auteur;
    }

    public function setAnneePublication($anneePublication) {
        $this->anneePublication = $anneePublication;
    }

    public function setGenre($genre) {
        $this->genre = $genre;
    }

    // Méthode statique pour récupérer tous les livres depuis la base de données
    public static function getAllLivres($pdo) {
        $stmt = $pdo->query('SELECT * FROM livres');
        $livres = [];
        while ($row = $stmt->fetch()) {
            $livres[] = new Livre(
                $row['isbn'],
                $row['titre'],
                $row['auteur'],
                $row['annee_publication'],
                $row['genre']
            );
        }
        return $livres;
    }
}
?>
