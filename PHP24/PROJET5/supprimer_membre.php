<?php
require_once 'includes/init.php';
include 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm'])) {
    $id = $_POST['id'];
    $stmt = $pdo->prepare("DELETE FROM membres WHERE id = ?");
    $stmt->execute([$id]);
    header('Location: afficher_membres.php');
    exit();
}

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM membres WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $membre = $stmt->fetch();
    if (!$membre) {
        die("Membre non trouvé.");
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<?php include 'includes/header.php'; ?>
    <title>Supprimer un Membre</title>
</head>
<body>
    
    <div class="container-fluid">
        <div class="row">
            <main class="col-md-9 ml-sm-auto col-lg-10 px-4 main-content">
                <h2 class="mt-4">Supprimer un Membre</h2>
                <div class="card">
                    <div class="card-body">
                        <form action="supprimer_membre.php" method="post">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($membre['id'], ENT_QUOTES, 'UTF-8') ?>">
                            <p>Êtes-vous sûr de vouloir supprimer ce membre ?</p>
                            <ul>
                                <li>Nom: <?= htmlspecialchars($membre['nom'], ENT_QUOTES, 'UTF-8') ?></li>
                                <li>Email: <?= htmlspecialchars($membre['email'], ENT_QUOTES, 'UTF-8') ?></li>
                                <li>Date d'Adhésion: <?= htmlspecialchars($membre['date_adhesion'], ENT_QUOTES, 'UTF-8') ?></li>
                            </ul>
                            <button type="submit" name="confirm" class="btn btn-danger">Confirmer</button>
                            <a href="afficher_membres.php" class="btn btn-secondary">Annuler</a>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>
