<?php
require_once 'includes/init.php';
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
</body>
</html>
