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

$message = isset($_GET['message']) ? $_GET['message'] : '';
$membresParPage = 10;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$offset = ($page - 1) * $membresParPage;

$sql = "SELECT id, nom, email, date_adhesion FROM membres LIMIT :limit OFFSET :offset";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':limit', $membresParPage, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$membres = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sqlCount = "SELECT COUNT(*) FROM membres";
$stmtCount = $pdo->prepare($sqlCount);
$stmtCount->execute();
$totalMembres = $stmtCount->fetchColumn();
$totalPages = ceil($totalMembres / $membresParPage);
?>

<div class="container-fluid">
    <div class="row">
        <main class="col-md-12 ml-sm-auto col-lg-12 px-4">
            <h2>Modifier un Membre</h2>
            <?php if ($message): ?>
                <div class="alert alert-success">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
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

                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <?php if($page > 1): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?= $page - 1; ?>" aria-label="Précédent">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php endif; ?>
                            <?php for($i = 1; $i <= $totalPages; $i++): ?>
                            <li class="page-item <?php if($i == $page) echo 'active'; ?>">
                                <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                            </li>
                            <?php endfor; ?>
                            <?php if($page < $totalPages): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?= $page + 1; ?>" aria-label="Suivant">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
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
