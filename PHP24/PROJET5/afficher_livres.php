<?php
require_once 'includes/init.php';
include 'auth.php';
include 'includes/header.php';

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 10;
$offset = ($page - 1) * $limit;

$search = isset($_GET['search']) ? trim($_GET['search']) : '';

if ($search) {
    $tousLesLivres = Livre::searchLivres($pdo, $search, $limit, $offset);
    $totalLivres = Livre::getNombreTotalDeLivresRecherche($pdo, $search);
} else {
    $tousLesLivres = Livre::getLivresParPage($pdo, $limit, $offset);
    $totalLivres = Livre::getNombreTotalDeLivres($pdo);
}

$totalPages = ceil($totalLivres / $limit);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Afficher les Livres</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row2">
            <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h2 class="mt-4 mb-4">Livres Disponibles</h2>
                <form method="GET" action="">
                    <input class="form-control mb-4" name="search" id="searchInput" type="text" placeholder="Rechercher un livre..." value="<?= htmlspecialchars($search, ENT_QUOTES, 'UTF-8') ?>">
                </form>
                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th>ISBN</th>
                            <th>Titre</th>
                            <th>Auteur</th>
                            <th>Année</th>
                            <th>Genre</th>
                        </tr>
                    </thead>
                    <tbody id="livreTable">
                        <?php if ($tousLesLivres) : ?>
                            <?php foreach ($tousLesLivres as $livre) : ?>
                                <tr>
                                    <td><?= htmlspecialchars($livre->getIsbn(), ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars($livre->getTitre(), ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars($livre->getAuteur(), ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars($livre->getAnneePublication(), ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars($livre->getGenre(), ENT_QUOTES, 'UTF-8') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="5">Aucun livre trouvé.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <nav>
                    <ul class="pagination">
                        <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                            <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                                <a class="page-link" href="?page=<?= $i ?>&search=<?= htmlspecialchars($search, ENT_QUOTES, 'UTF-8') ?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </nav>
            </main>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>
