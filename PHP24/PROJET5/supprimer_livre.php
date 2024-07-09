<?php
require_once 'includes/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm'])) {
    $isbn = $_POST['isbn'];
    $stmt = $pdo->prepare("DELETE FROM livres WHERE isbn = ?");
    $stmt->execute([$isbn]);
    header('Location: afficher_livres.php');
    exit();
}

if (isset($_GET['isbn'])) {
    $stmt = $pdo->prepare("SELECT * FROM livres WHERE isbn = ?");
    $stmt->execute([$_GET['isbn']]);
    $livre = $stmt->fetch();
    if (!$livre) {
        die("Livre non trouvé.");
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.amazonaws.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Supprimer un Livre</title>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include 'includes/sidebar.php'; ?>
            <main class="col-md-9 ml-sm-auto col-lg-10 px-4 main-content">
                <h2 class="mt-4">Supprimer un Livre</h2>
                <div class="card">
                    <div class="card-body">
                        <form action="supprimer_livre.php" method="post">
                            <input type="hidden" name="isbn" value="<?= htmlspecialchars($livre['isbn'], ENT_QUOTES, 'UTF-8') ?>">
                            <p>Êtes-vous sûr de vouloir supprimer ce livre ?</p>
                            <ul>
                                <li>Titre: <?= htmlspecialchars($livre['titre'], ENT_QUOTES, 'UTF-8') ?></li>
                                <li>Auteur: <?= htmlspecialchars($livre['auteur'], ENT_QUOTES, 'UTF-8') ?></li>
                                <li>Année de Publication: <?= htmlspecialchars($livre['annee_publication'], ENT_QUOTES, 'UTF-8') ?></li>
                                <li>Genre: <?= htmlspecialchars($livre['genre'], ENT_QUOTES, 'UTF-8') ?></li>
                            </ul>
                            <button type="submit" name="confirm" class="btn btn-danger">Confirmer</button>
                            <a href="afficher_livres.php" class="btn btn-secondary">Annuler</a>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.amazonaws.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
