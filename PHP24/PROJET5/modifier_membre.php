<?php
include 'auth.php';
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

// Récupérer les membres
$sql = "SELECT id, nom, email, date_adhesion FROM membres";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$membres = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container-fluid">
    <div class="row">
        <main class="col-md-12 ml-sm-auto col-lg-12 px-4">
            <h2>Modifier un Membre</h2>
            <div class="card">
                <div class="card-body">
                    <?php if (!empty($membres)): ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Date d'adhésion</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($membres as $membre): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($membre['id']); ?></td>
                                <td><?php echo htmlspecialchars($membre['nom']); ?></td>
                                <td><?php echo htmlspecialchars($membre['email']); ?></td>
                                <td><?php echo htmlspecialchars($membre['date_adhesion']); ?></td>
                                <td>
                                    <a href="modifier_membre_form.php?id=<?php echo $membre['id']; ?>" class="btn btn-primary">Modifier</a>
                                    <a href="supprimer_membre.php?id=<?php echo $membre['id']; ?>" class="btn btn-danger">Supprimer</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php else: ?>
                        <p>Aucun membre trouvé.</p>
                    <?php endif; ?>
                </div>
            </div>
        </main>
    </div>
</div>

<?php
include 'includes/footer.php';
?>
