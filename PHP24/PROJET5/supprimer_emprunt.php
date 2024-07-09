<?php
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

// Logique pour supprimer un emprunt
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_emprunt'])) {
    $id_emprunt = $_POST['id_emprunt'];

    $sqlDelete = "DELETE FROM emprunts WHERE id = ?";
    $stmtDelete = $pdo->prepare($sqlDelete);
    $stmtDelete->execute([$id_emprunt]);

    $message = "Emprunt supprimé avec succès.";
}

// Récupérer tous les emprunts pour l'afficher dans le formulaire
$sqlEmprunts = "SELECT e.id, l.titre, l.auteur, m.nom, e.date_emprunt, e.date_retour 
                FROM emprunts e 
                JOIN livres l ON e.id_livre = l.id 
                JOIN membres m ON e.id_membre = m.id";
$stmtEmprunts = $pdo->prepare($sqlEmprunts);
$stmtEmprunts->execute();
$emprunts = $stmtEmprunts->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container-fluid">
    <div class="row">
        <main class="col-md-12 ml-sm-auto col-lg-12 px-4">
            <h2>Supprimer Emprunt</h2>
            <?php if (isset($message)): ?>
                <div class="alert alert-success"><?php echo $message; ?></div>
            <?php endif; ?>
            <div class="card">
                <div class="card-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="id_emprunt">Sélectionner un emprunt</label>
                            <select id="id_emprunt" name="id_emprunt" class="form-control selectpicker" data-live-search="true">
                                <?php foreach ($emprunts as $emprunt): ?>
                                    <option value="<?php echo $emprunt['id']; ?>">
                                        <?php echo htmlspecialchars("{$emprunt['titre']} - {$emprunt['auteur']} emprunté par {$emprunt['nom']} du {$emprunt['date_emprunt']} au {$emprunt['date_retour']}"); ?>
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
