<?php
include 'auth.php';
include 'includes/header.php';
include 'config/database.php'; 

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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_membre'])) {
    $id_membre = $_POST['id_membre'];

    $sqlDelete = "DELETE FROM membres WHERE id = ?";
    $stmtDelete = $pdo->prepare($sqlDelete);
    $stmtDelete->execute([$id_membre]);

    $message = "Membre supprimé avec succès.";
}

$sqlMembres = "SELECT id, nom, email FROM membres";
$stmtMembres = $pdo->prepare($sqlMembres);
$stmtMembres->execute();
$membres = $stmtMembres->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container-fluid">
    <div class="row">
        <main class="col-md-12 ml-sm-auto col-lg-12 px-4">
            <h2>Supprimer Membre</h2>
            <?php if (isset($message)): ?>
                <div class="alert alert-success"><?php echo $message; ?></div>
            <?php endif; ?>
            <div class="card">
                <div class="card-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="id_membre">Sélectionner un membre</label>
                            <select id="id_membre" name="id_membre" class="form-control selectpicker" data-live-search="true">
                                <?php foreach ($membres as $membre): ?>
                                    <option value="<?php echo $membre['id']; ?>">
                                        <?php echo htmlspecialchars("{$membre['nom']} - {$membre['email']}"); ?>
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
