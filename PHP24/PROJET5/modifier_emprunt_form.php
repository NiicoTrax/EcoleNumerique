<?php
include 'auth.php';
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

$id = $_GET['id'];
$sql = "SELECT * FROM emprunts WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$emprunt = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$emprunt) {
    die("Emprunt non trouvé.");
}

$sqlLivres = "SELECT id, titre FROM livres";
$stmtLivres = $pdo->prepare($sqlLivres);
$stmtLivres->execute();
$livres = $stmtLivres->fetchAll(PDO::FETCH_ASSOC);

$sqlMembres = "SELECT id, nom FROM membres";
$stmtMembres = $pdo->prepare($sqlMembres);
$stmtMembres->execute();
$membres = $stmtMembres->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_livre = $_POST['id_livre'];
    $id_membre = $_POST['id_membre'];
    $date_emprunt = $_POST['date_emprunt'];
    $date_retour = $_POST['date_retour'];

    $sqlUpdate = "UPDATE emprunts SET id_livre = ?, id_membre = ?, date_emprunt = ?, date_retour = ? WHERE id = ?";
    $stmtUpdate = $pdo->prepare($sqlUpdate);
    $stmtUpdate->execute([$id_livre, $id_membre, $date_emprunt, $date_retour, $id]);

    $message = "Emprunt modifié avec succès.";
    header("Location: modifier_emprunt.php?message=" . urlencode($message));
    exit;
}
?>

<?php
include 'includes/header.php';
?>

<div class="container-fluid">
    <div class="row">
        <main class="col-md-12 ml-sm-auto col-lg-12 px-4">
            <h2>Modifier Emprunt</h2>
            <div class="card">
                <div class="card-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="id_livre">Livre</label>
                            <select name="id_livre" id="id_livre" class="form-control">
                                <?php foreach ($livres as $livre): ?>
                                    <option value="<?php echo $livre['id']; ?>" <?php echo $emprunt['id_livre'] == $livre['id'] ? 'selected' : ''; ?>>
                                        <?php echo $livre['titre']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_membre">Membre</label>
                            <select name="id_membre" id="id_membre" class="form-control">
                                <?php foreach ($membres as $membre): ?>
                                    <option value="<?php echo $membre['id']; ?>" <?php echo $emprunt['id_membre'] == $membre['id'] ? 'selected' : ''; ?>>
                                        <?php echo $membre['nom']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="date_emprunt">Date d'emprunt</label>
                            <input type="date" name="date_emprunt" id="date_emprunt" class="form-control" value="<?php echo $emprunt['date_emprunt']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="date_retour">Date de retour</label>
                            <input type="date" name="date_retour" id="date_retour" class="form-control" value="<?php echo $emprunt['date_retour']; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>

<?php
include 'includes/footer.php';
?>
