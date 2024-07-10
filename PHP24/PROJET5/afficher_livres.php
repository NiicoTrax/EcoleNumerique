<?php
require_once 'includes/init.php';
include 'auth.php';

// Récupérer tous les livres en utilisant la méthode statique de la classe Livre
$tousLesLivres = Livre::getAllLivres($pdo);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<?php include 'includes/header.php'; ?>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h2 class="mt-4">Livres Disponibles</h2>
                <input class="form-control" id="searchInput" type="text" placeholder="Rechercher un livre...">
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
                        <?php foreach ($tousLesLivres as $livre) : ?>
                            <tr>
                                <td><?= htmlspecialchars($livre->getIsbn(), ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($livre->getTitre(), ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($livre->getAuteur(), ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($livre->getAnneePublication(), ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($livre->getGenre(), ENT_QUOTES, 'UTF-8') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </main>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            var input = this.value.toLowerCase();
            var rows = document.querySelectorAll('#livreTable tr');
            rows.forEach(row => {
                row.style.display = row.innerText.toLowerCase().includes(input) ? '' : 'none';
            });
        });
    </script>
</body>
</html>
