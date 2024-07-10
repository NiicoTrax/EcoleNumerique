<?php
require_once 'includes/init.php';

// Récupérer le terme de recherche
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

// Rechercher les livres correspondants
if ($search) {
    $livres = Livre::searchLivres($pdo, $search, 10, 0); // Limite à 10 résultats pour des raisons de performance
} else {
    $livres = [];
}

// Retourner les résultats en JSON
header('Content-Type: application/json');
echo json_encode(array_map(function($livre) {
    return [
        'isbn' => $livre->getIsbn(),
        'titre' => $livre->getTitre(),
        'auteur' => $livre->getAuteur(),
        'annee_publication' => $livre->getAnneePublication(),
        'genre' => $livre->getGenre(),
    ];
}, $livres));
?>
