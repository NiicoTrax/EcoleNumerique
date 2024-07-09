<?php
require_once 'includes/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm'])) {
    $id = $_POST['id'];
    $stmt = $pdo->prepare("DELETE FROM emprunts WHERE id = ?");
    $stmt->execute([$id]);
    header('Location: afficher_emprunts.php');
    exit();
}

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM emprunts WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $emprunt = $stmt->fetch();
    if (!$emprunt) {
        die("Emprunt non trouvé.");
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Supprimer un Emprunt</title>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include 'includes/sidebar.php'; ?>
            <main class="col-md-9 ml-sm-auto col-lg-10 px-4 main-content">
                <h2 class="mt-4">Supprimer un Emprunt</h2>
                <div class="card">
                    <div class="card-body">
                        <form action="supprimer_emprunt.php" method="post">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($emprunt['id'], ENT_QUOTES, 'UTF-8') ?>">
                            <p>Êtes-vous sûr de vouloir supprimer cet emprunt ?</p>
                            <ul>
                                <li>ID Livre: <?= htmlspecialchars($emprunt['id_livre'], ENT_QUOTES, 'UTF-8') ?></li>
                                <li>ID Membre: <?= htmlspecialchars($emprunt['id_membre'], ENT_QUOTES, 'UTF-8') ?></li>
                                <li>Date d'Emprunt: <?= htmlspecialchars($emprunt['date_emprunt'], ENT_QUOTES, 'UTF-8') ?></li>
                                <li>Date de Retour: <?= htmlspecialchars($emprunt['date_retour'], ENT_QUOTES, 'UTF-8') ?></li>
                            </ul>
                            <button type="submit" name="confirm" class="btn btn-danger">Confirmer</button>
                            <a href="afficher_emprunts.php" class="btn btn-secondary">Annuler</a>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
