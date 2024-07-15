<?php
include 'auth.php';
include 'includes/header.php';
include 'config/database.php'; 

$message = isset($_GET['message']) ? $_GET['message'] : '';
$livresParPage = 10;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$offset = ($page - 1) * $livresParPage;

$sql = "SELECT id, isbn, titre, auteur, annee_publication, genre FROM livres LIMIT :limit OFFSET :offset";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':limit', $livresParPage, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$livres = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sqlCount = "SELECT COUNT(*) FROM livres";
$stmtCount = $pdo->prepare($sqlCount);
$stmtCount->execute();
$totalLivres = $stmtCount->fetchColumn();
$totalPages = ceil($totalLivres / $livresParPage);
?>

<div class="container-fluid">
    <div class="row">
        <main class="col-md-12 ml-sm-auto col-lg-12 px-4">
            <h2>Modifier un Livre</h2>
            <?php if ($message): ?>
                <div class="alert alert-success">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
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

                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <?php if($page > 1): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $page - 1; ?>" aria-label="Précédent">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php endif; ?>
                            <?php for($i = 1; $i <= $totalPages; $i++): ?>
                            <li class="page-item <?php if($i == $page) echo 'active'; ?>">
                                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                            <?php endfor; ?>
                            <?php if($page < $totalPages): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $page + 1; ?>" aria-label="Suivant">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </main>
    </div>
</div>

<?php
include 'includes/footer.php';
?>
