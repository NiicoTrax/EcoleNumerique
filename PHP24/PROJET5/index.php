<?php
require_once 'includes/init.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Système de Gestion de Bibliothèque</title>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include 'includes/sidebar.php'; ?>
            <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h2 class="mt-4">Livres Disponibles</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ISBN</th>
                            <th>Titre</th>
                            <th>Auteur</th>
                            <th>Année</th>
                            <th>Genre</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $tousLesLivres = $bibliotheque->listerTousLesLivres();
                        foreach ($tousLesLivres as $livre) : ?>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
