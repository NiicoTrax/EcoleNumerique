<?php require 'data.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Élève: <?= $eleve['nom'] ?> <?= $eleve['prenom'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=0">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <?php if ($eleve): ?>
        <div class="details-container">
            <h1>Fiche élève <?= $eleve['nom'] ?> <?= $eleve['prenom'] ?></h1>
            <div class="section">
                <div class="section-title">Information élève</div>
                <div class="section-content">
                <?php 
                    $genre = $eleve['genre'] ?? ''; 
                    $image = ($genre === 'Homme') ? 'profilh.png' : 'profilf.png';
                ?>
                <img class="profile-picture" src="assets/images/<?= $image ?>" alt="Photo de l'élève">
                <br>
                    <div class="form-group">
                        <label>Nom :</label>
                        <span><?= $eleve['nom'] ?></span>
                    </div>
                    <div class="form-group">
                        <label>Prénom :</label>
                        <span><?= $eleve['prenom'] ?></span>
                    </div>
                    <div class="form-group">
                        <label>Âge :</label>
                        <span><?= $eleve['age'] ?></span>
                    </div>
                    <div class="form-group">
                        <label>Sexe :</label>
                        <span><?= $eleve['genre'] ?></span>
                    </div>
                    <div class="form-group">
                        <label>Ville :</label>
                        <span><?= $eleve['ville'] ?></span>
                    </div>
                </div>
            </div>
            <div class="section">
                <div class="section-title">Information supplémentaire</div>
                <div class="section-content">
                <div class="form-group">
                    <label>Passions :</label>
                    <ul class="passions">
                        <li><?= htmlspecialchars($eleve['passions'][0]) ?></li>
                        <li><?= htmlspecialchars($eleve['passions'][1]) ?></li>
                        <li><?= htmlspecialchars($eleve['passions'][2]) ?></li>
                        <li><?= htmlspecialchars($eleve['passions'][3]) ?></li>
                    </ul>
                </div>
            </div>
            </div>
        </div>
            <a class="back-link" href="index.php">Retour à la liste des élèves</a>
        </div>
    <?php else: ?>
        <h1>Erreur</h1>
        <p>Aucun élève trouvé pour l'index spécifié.</p>
    <?php endif; ?>

    <script src="assets/js/index.js"></script>
</body>
</html>
