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

// Récupérer les emprunts
$sql = "SELECT e.id, l.titre AS livre, m.nom AS membre, e.date_emprunt, e.date_retour FROM emprunts e
        JOIN livres l ON e.id_livre = l.id
        JOIN membres m ON e.id_membre = m.id";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$emprunts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container-fluid">
    <div class="row">
        <main class="col-md-12 ml-sm-auto col-lg-12 px-4">
            <h2>Modifier un Emprunt</h2>
            <div class="card">
                <div class="card-body">
                    <?php if (!empty($emprunts)): ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Livre</th>
                                <th>Membre</th>
                                <th>Date d'emprunt</th>
                                <th>Date de retour</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($emprunts as $emprunt): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($emprunt['id']); ?></td>
                                <td><?php echo htmlspecialchars($emprunt['livre']); ?></td>
                                <td><?php echo htmlspecialchars($emprunt['membre']); ?></td>
                                <td><?php echo htmlspecialchars($emprunt['date_emprunt']); ?></td>
                                <td><?php echo htmlspecialchars($emprunt['date_retour']); ?></td>
                                <td>
                                    <a href="modifier_emprunt_form.php?id=<?php echo $emprunt['id']; ?>" class="btn btn-primary">Modifier</a>
                                    <a href="supprimer_emprunt.php?id=<?php echo $emprunt['id']; ?>" class="btn btn-danger">Supprimer</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php else: ?>
                        <p>Aucun emprunt trouvé.</p>
                    <?php endif; ?>
                </div>
            </div>
        </main>
    </div>
</div>

<?php
include 'includes/footer.php';
?>
