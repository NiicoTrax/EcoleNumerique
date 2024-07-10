<?php
require_once 'includes/init.php';
include 'auth.php';

$tousLesMembres = $bibliotheque->listerTousLesMembres();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<?php include 'includes/header.php'; ?>
    <title>Afficher les Membres</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            
            <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h2 class="mt-4">Membres Inscrits</h2>
                <input class="form-control" id="searchInput" type="text" placeholder="Rechercher un membre...">
                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Date d'Adhésion</th>
                        </tr>
                    </thead>
                    <tbody id="membreTable">
                        <?php foreach ($tousLesMembres as $membre) : ?>
                            <tr>
                                <td><?= htmlspecialchars($membre->getId(), ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($membre->getNom(), ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($membre->getEmail(), ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($membre->getDateAdhesion(), ENT_QUOTES, 'UTF-8') ?></td>
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
            var rows = document.querySelectorAll('#membreTable tr');
            rows.forEach(row => {
                row.style.display = row.innerText.toLowerCase().includes(input) ? '' : 'none';
            });
        });
    </script>
</body>
</html>
