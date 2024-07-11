<?php
require_once 'includes/init.php';

try {
    // Récupérer le terme de recherche
    $search = isset($_GET['search']) ? trim($_GET['search']) : '';

    $limit = 10; // Limite à 10 résultats pour des raisons de performance
    $offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;

    // Rechercher les livres correspondants
    if ($search !== '') {
        $livres = Livre::searchLivres($pdo, $search, $limit, $offset);
    } else {
        $livres = Livre::getLivresParPage($pdo, $limit, $offset);
    }

    // Générer le HTML
    $html = '';
    foreach ($livres as $livre) {
        $html .= '<tr>';
        $html .= '<td>' . htmlspecialchars($livre->getIsbn(), ENT_QUOTES, 'UTF-8') . '</td>';
        $html .= '<td>' . htmlspecialchars($livre->getTitre(), ENT_QUOTES, 'UTF-8') . '</td>';
        $html .= '<td>' . htmlspecialchars($livre->getAuteur(), ENT_QUOTES, 'UTF-8') . '</td>';
        $html .= '<td>' . htmlspecialchars($livre->getAnneePublication(), ENT_QUOTES, 'UTF-8') . '</td>';
        $html .= '<td>' . htmlspecialchars($livre->getGenre(), ENT_QUOTES, 'UTF-8') . '</td>';
        $html .= '</tr>';
    }

    echo $html;

} catch (Exception $e) {
    echo '<tr><td colspan="5">Erreur: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</td></tr>';
}
?>
