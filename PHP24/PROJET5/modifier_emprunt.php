<?php
require_once 'includes/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $idLivre = $_POST['id_livre'];
    $idMembre = $_POST['id_membre'];
    $dateEmprunt = $_POST['date_emprunt'];
    $dateRetour = $_POST['date_retour'];

    $stmt = $pdo->prepare("UPDATE emprunts SET id_livre = ?, id_membre = ?, date_emprunt = ?, date_retour = ? WHERE id = ?");
    $stmt->execute([$idLivre, $idMembre, $dateEmprunt, $dateRetour, $id]);

    header('Location: afficher_emprunts.php');
    exit();
}

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM emprunts WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $emprunt = $stmt->fetch();

    if (!$emprunt) {
        die("Emprunt non trouvé.");
    }
}

$tousLesMembres = $bibliotheque->listerTousLesMembres();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Modifier un Emprunt</title>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include 'includes/sidebar.php'; ?>
            <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h2 class="mt-4">Modifier un Emprunt</h2>
                <div class="card">
                    <div class="card-body">
                        <form action="modifier_emprunt.php" method="post">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($emprunt['id'], ENT_QUOTES, 'UTF-8') ?>">
                            <div class="form-group">
                                <label for="id_livre">ID Livre</label>
                                <input type="number" class="form-control" id="id_livre" name="id_livre" value="<?= htmlspecialchars($emprunt['id_livre'], ENT_QUOTES, 'UTF-8') ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="id_membre">Membre</label>
                                <select class="form-control" id="id_membre" name="id_membre" required>
                                    <?php foreach ($tousLesMembres as $membre) : ?>
                                        <option value="<?= htmlspecialchars($membre->getId(), ENT_QUOTES, 'UTF-8') ?>" <?= $membre->getId() == $emprunt['id_membre'] ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($membre->getNom(), ENT_QUOTES, 'UTF-8') ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="date_emprunt">Date d'Emprunt</label>
                                <input type="date" class="form-control" id="date_emprunt" name="date_emprunt" value="<?= htmlspecialchars($emprunt['date_emprunt'], ENT_QUOTES, 'UTF-8') ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="date_retour">Date de Retour</label>
                                <input type="date" class="form-control" id="date_retour" name="date_retour" value="<?= htmlspecialchars($emprunt['date_retour'], ENT_QUOTES, 'UTF-8') ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.amazonaws.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
