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

    // Méthode statique pour récupérer les livres par page
    public static function getLivresParPage($pdo, $limit, $offset) {
        $stmt = $pdo->prepare('SELECT * FROM livres LIMIT :limit OFFSET :offset');
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
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

    // Méthode statique pour obtenir le nombre total de livres
    public static function getNombreTotalDeLivres($pdo) {
        $stmt = $pdo->query('SELECT COUNT(*) FROM livres');
        return $stmt->fetchColumn();
    }

    // Méthode statique pour rechercher des livres avec pagination
    public static function searchLivres($pdo, $search, $limit, $offset) {
        $search = "%$search%";
        $stmt = $pdo->prepare('SELECT * FROM livres WHERE titre LIKE :search OR auteur LIKE :search OR genre LIKE :search LIMIT :limit OFFSET :offset');
        $stmt->bindParam(':search', $search, PDO::PARAM_STR);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
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

    // Méthode statique pour obtenir le nombre total de livres correspondant à une recherche
    public static function getNombreTotalDeLivresRecherche($pdo, $search) {
        $search = "%$search%";
        $stmt = $pdo->prepare('SELECT COUNT(*) FROM livres WHERE titre LIKE :search OR auteur LIKE :search OR genre LIKE :search');
        $stmt->bindParam(':search', $search, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
}

?>
