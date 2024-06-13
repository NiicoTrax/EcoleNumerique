<?php require 'data.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des élèves</title>
    <meta name="viewport" content="width=device-width, initial-scale=0">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Liste des élèves</h1>
        <div class="student-list">
            <?php foreach ($eleves as $index => $eleve): ?>
                <div class="student-item">
                    <div class="student-details">
                        <div class="student-name"><?= $eleve['nom'] . ' ' . $eleve['prenom'] ?></div>
                    </div>
                    <a class="student-link" href="eleve.php?index=<?= $index ?>">Voir la fiche</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
