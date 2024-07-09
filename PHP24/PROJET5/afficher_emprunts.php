<?php
require_once 'includes/init.php';

$tousLesEmprunts = $bibliotheque->listerTousLesEmprunts();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Afficher les Emprunts</title>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include 'includes/sidebar.php'; ?>
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
            </main>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.amazonaws.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
