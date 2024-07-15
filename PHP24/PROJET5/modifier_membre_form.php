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

$id = $_GET['id'];
$sql = "SELECT * FROM membres WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$membre = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$membre) {
    die("Membre non trouvé.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $date_adhesion = $_POST['date_adhesion'];

    $sqlUpdate = "UPDATE membres SET nom = ?, email = ?, date_adhesion = ? WHERE id = ?";
    $stmtUpdate = $pdo->prepare($sqlUpdate);
    $stmtUpdate->execute([$nom, $email, $date_adhesion, $id]);

    header("Location: modifier_membre.php");
    exit;
}
?>

<div class="container-fluid">
    <div class="row">
        <main class="col-md-12 ml-sm-auto col-lg-12 px-4">
            <h2>Modifier Membre</h2>
            <div class="card">
                <div class="card-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" id="nom" name="nom" class="form-control" value="<?php echo htmlspecialchars($membre['nom']); ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($membre['email']); ?>">
                        </div>
                        <div class="form-group">
                            <label for="date_adhesion">Date d'adhésion</label>
                            <input type="date" id="date_adhesion" name="date_adhesion" class="form-control" value="<?php echo htmlspecialchars($membre['date_adhesion']); ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>

<?php
include 'includes/footer.php';
?>
