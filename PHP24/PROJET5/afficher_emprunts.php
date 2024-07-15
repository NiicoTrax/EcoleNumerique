<?php
require_once 'includes/init.php';
include 'auth.php';

$empruntsParPage = 10;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$offset = ($page - 1) * $empruntsParPage;

$tousLesEmprunts = $bibliotheque->listerTousLesEmprunts($empruntsParPage, $offset);

$totalEmprunts = $bibliotheque->compterTousLesEmprunts();
$totalPages = ceil($totalEmprunts / $empruntsParPage);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<?php include 'includes/header.php'; ?>
</head>
<body>
    <div class="container-fluid">
        <div class="row2">
            <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h2 class="mt-4">Emprunts en Cours</h2>
                <input class="form-control" id="searchInput" type="text" placeholder="Rechercher un emprunt...">
                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th>ID Emprunt</th>
                            <th>ID Livre</th>
                            <th>Nom Membre</th>
                            <th>Date d'Emprunt</th>
                            <th>Date de Retour</th>
                        </tr>
                    </thead>
                    <tbody id="empruntTable">
                        <?php foreach ($tousLesEmprunts as $emprunt) : 
                            $membre = $bibliotheque->rechercherMembreParId($emprunt->getIdMembre());
                            ?>
                            <tr>
                                <td><?= htmlspecialchars($emprunt->getIdEmprunt(), ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($emprunt->getIdLivre(), ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($membre->getNom(), ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($emprunt->getDateEmprunt(), ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($emprunt->getDateRetour(), ENT_QUOTES, 'UTF-8') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <?php if($page > 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?= $page - 1; ?>" aria-label="Précédent">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php for($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?php if($i == $page) echo 'active'; ?>">
                            <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                        </li>
                        <?php endfor; ?>
                        <?php if($page < $totalPages): ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?= $page + 1; ?>" aria-label="Suivant">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </main>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            var input = this.value.toLowerCase();
            var rows = document.querySelectorAll('#empruntTable tr');
            rows.forEach(row => {
                row.style.display = row.innerText.toLowerCase().includes(input) ? '' : 'none';
            });
        });
    </script>
</body>
</html>
