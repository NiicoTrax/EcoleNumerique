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

// Récupérer les informations du livre
$id = $_GET['id'];
$sql = "SELECT * FROM livres WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$livre = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$livre) {
    die("Livre non trouvé.");
}

// Mise à jour du livre
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isbn = $_POST['isbn'];
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $annee_publication = $_POST['annee_publication'];
    $genre = $_POST['genre'];

    $sqlUpdate = "UPDATE livres SET isbn = ?, titre = ?, auteur = ?, annee_publication = ?, genre = ? WHERE id = ?";
    $stmtUpdate = $pdo->prepare($sqlUpdate);
    $stmtUpdate->execute([$isbn, $titre, $auteur, $annee_publication, $genre, $id]);

    header("Location: modifier_livre.php");
    exit;
}
?>

<div class="container-fluid">
    <div class="row">
        <main class="col-md-12 ml-sm-auto col-lg-12 px-4">
            <h2>Modifier Livre</h2>
            <div class="card">
                <div class="card-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="isbn">ISBN</label>
                            <input type="text" id="isbn" name="isbn" class="form-control" value="<?php echo htmlspecialchars($livre['isbn']); ?>">
                        </div>
                        <div class="form-group">
                            <label for="titre">Titre</label>
                            <input type="text" id="titre" name="titre" class="form-control" value="<?php echo htmlspecialchars($livre['titre']); ?>">
                        </div>
                        <div class="form-group">
                            <label for="auteur">Auteur</label>
                            <input type="text" id="auteur" name="auteur" class="form-control" value="<?php echo htmlspecialchars($livre['auteur']); ?>">
                        </div>
                        <div class="form-group">
                            <label for="annee_publication">Année de publication</label>
                            <input type="number" id="annee_publication" name="annee_publication" class="form-control" value="<?php echo htmlspecialchars($livre['annee_publication']); ?>">
                        </div>
                        <div class="form-group">
                            <label for="genre">Genre</label>
                            <input type="text" id="genre" name="genre" class="form-control" value="<?php echo htmlspecialchars($livre['genre']); ?>">
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
