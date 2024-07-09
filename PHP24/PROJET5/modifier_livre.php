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

// Récupérer les livres
$sql = "SELECT id, isbn, titre, auteur, annee_publication, genre FROM livres";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$livres = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container-fluid">
    <div class="row">
        <main class="col-md-12 ml-sm-auto col-lg-12 px-4">
            <h2>Modifier un Livre</h2>
            <div class="card">
                <div class="card-body">
                    <?php if (!empty($livres)): ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>ISBN</th>
                                <th>Titre</th>
                                <th>Auteur</th>
                                <th>Année de publication</th>
                                <th>Genre</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($livres as $livre): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($livre['id']); ?></td>
                                <td><?php echo htmlspecialchars($livre['isbn']); ?></td>
                                <td><?php echo htmlspecialchars($livre['titre']); ?></td>
                                <td><?php echo htmlspecialchars($livre['auteur']); ?></td>
                                <td><?php echo htmlspecialchars($livre['annee_publication']); ?></td>
                                <td><?php echo htmlspecialchars($livre['genre']); ?></td>
                                <td>
                                    <a href="modifier_livre_form.php?id=<?php echo $livre['id']; ?>" class="btn btn-primary">Modifier</a>
                                    <a href="supprimer_livre.php?id=<?php echo $livre['id']; ?>" class="btn btn-danger">Supprimer</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php else: ?>
                        <p>Aucun livre trouvé.</p>
                    <?php endif; ?>
                </div>
            </div>
        </main>
    </div>
</div>

<?php
include 'includes/footer.php';
?>
