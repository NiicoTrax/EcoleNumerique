<?php
include 'includes/header.php';
include 'config/database.php';

// Connexion à la base de données
try {
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

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
    <title>Supprimer un Livre</title>
</head>
<body>
    
    <div class="container-fluid">
        <div class="row">
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
</body>
</html>
