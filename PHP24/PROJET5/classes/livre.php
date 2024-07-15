<?php

class Livre {
    private $isbn;
    private $titre;
    private $auteur;
    private $anneePublication;
    private $genre;

    // Constructor to initialize the book object with given parameters
    public function __construct($isbn, $titre, $auteur, $anneePublication, $genre) {
        $this->isbn = $isbn;
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->anneePublication = $anneePublication;
        $this->genre = $genre;
    }

    // Getter method for ISBN
    public function getIsbn() {
        return $this->isbn;
    }

    // Getter method for title
    public function getTitre() {
        return $this->titre;
    }

    // Getter method for author
    public function getAuteur() {
        return $this->auteur;
    }

    // Getter method for publication year
    public function getAnneePublication() {
        return $this->anneePublication;
    }

    // Getter method for genre
    public function getGenre() {
        return $this->genre;
    }

    // Setter method for ISBN
    public function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

    // Setter method for title
    public function setTitre($titre) {
        $this->titre = $titre;
    }

    // Setter method for author
    public function setAuteur($auteur) {
        $this->auteur = $auteur;
    }

    // Setter method for publication year
    public function setAnneePublication($anneePublication) {
        $this->anneePublication = $anneePublication;
    }

    // Setter method for genre
    public function setGenre($genre) {
        $this->genre = $genre;
    }

    // Static method to get all books from the database
    public static function getAllLivres($pdo) {
        $stmt = $pdo->query('SELECT * FROM livres');
        $livres = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if (self::isValidLivre($row)) {
                $livres[] = new Livre(
                    $row['isbn'],
                    $row['titre'],
                    $row['auteur'],
                    $row['annee_publication'],
                    $row['genre']
                );
            }
        }
        return $livres;
    }

    // Private method to validate a book row
    private static function isValidLivre($row) {
        return isset($row['isbn'], $row['titre'], $row['auteur'], $row['annee_publication'], $row['genre']) &&
               !empty($row['isbn']) && !empty($row['titre']) && !empty($row['auteur']) && !empty($row['annee_publication']) && !empty($row['genre']);
    }

    // Static method to get books with pagination
    public static function getLivresParPage($pdo, $limit, $offset) {
        $stmt = $pdo->prepare('SELECT * FROM livres LIMIT :limit OFFSET :offset');
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $livres = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if (self::isValidLivre($row)) {
                $livres[] = new Livre(
                    $row['isbn'],
                    $row['titre'],
                    $row['auteur'],
                    $row['annee_publication'],
                    $row['genre']
                );
            }
        }
        return $livres;
    }

    // Static method to get the total number of books in the database
    public static function getNombreTotalDeLivres($pdo) {
        $stmt = $pdo->query('SELECT COUNT(*) FROM livres');
        return $stmt->fetchColumn();
    }

    // Static method to search for books with pagination
    public static function searchLivres($pdo, $search, $limit, $offset) {
        $search = "%$search%";
        $stmt = $pdo->prepare('SELECT * FROM livres WHERE titre LIKE :search OR auteur LIKE :search OR genre LIKE :search LIMIT :limit OFFSET :offset');
        $stmt->bindParam(':search', $search, PDO::PARAM_STR);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $livres = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if (self::isValidLivre($row)) {
                $livres[] = new Livre(
                    $row['isbn'],
                    $row['titre'],
                    $row['auteur'],
                    $row['annee_publication'],
                    $row['genre']
                );
            }
        }
        return $livres;
    }

    // Static method to get the total number of books matching the search criteria
    public static function getNombreTotalDeLivresRecherche($pdo, $search) {
        $search = "%$search%";
        $stmt = $pdo->prepare('SELECT COUNT(*) FROM livres WHERE titre LIKE :search OR auteur LIKE :search OR genre LIKE :search');
        $stmt->bindParam(':search', $search, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
}
?>
