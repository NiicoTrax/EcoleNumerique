<?php
include 'auth.php';
include 'includes/header.php';
include 'config/database.php'; // Inclusion du fichier de configuration de la base de données

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

// Logique pour supprimer un livre
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_livre'])) {
    $id_livre = $_POST['id_livre'];

    $sqlDelete = "DELETE FROM livres WHERE id = ?";
    $stmtDelete = $pdo->prepare($sqlDelete);
    $stmtDelete->execute([$id_livre]);

    $message = "Livre supprimé avec succès.";
}

// Récupérer tous les livres pour les afficher dans le formulaire
$sqlLivres = "SELECT id, titre, auteur FROM livres";
$stmtLivres = $pdo->prepare($sqlLivres);
$stmtLivres->execute();
$livres = $stmtLivres->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container-fluid">
    <div class<div class="container-fluid">
    <div class="row">
        <main class="col-md-12 ml-sm-auto col-lg-12 px-4">
            <h2>Supprimer Livre</h2>
            <?php if (isset($message)): ?>
                <div class="alert alert-success"><?php echo $message; ?></div>
            <?php endif; ?>
            <div class="card">
                <div class="card-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="id_livre">Sélectionner un livre</label>
                            <select id="id_livre" name="id_livre" class="form-control selectpicker" data-live-search="true">
                                <?php foreach ($livres as $livre): ?>
                                    <option value="<?php echo $livre['id']; ?>">
                                        <?php echo htmlspecialchars("{$livre['titre']} - {$livre['auteur']}"); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>

<?php
include 'includes/footer.php';
?>
