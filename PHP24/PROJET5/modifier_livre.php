<?php
require_once 'includes/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isbn = $_POST['isbn'];
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $annee_publication = $_POST['annee_publication'];
    $genre = $_POST['genre'];

    $stmt = $pdo->prepare("UPDATE livres SET titre = ?, auteur = ?, annee_publication = ?, genre = ? WHERE isbn = ?");
    $stmt->execute([$titre, $auteur, $annee_publication, $genre, $isbn]);

    header('Location: afficher_livres.php');
    exit();
}

if (isset($_GET['isbn'])) {
    $stmt = $pdo->prepare("SELECT * FROM livres WHERE isbn = ?");
    $stmt->execute([$_GET['isbn']]);
    $livre = $stmt->fetch();

    if (!$livre) {
        die("Livre non trouvé.");
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Modifier un Livre</title>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include 'includes/sidebar.php'; ?>
            <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h2 class="mt-4">Modifier un Livre</h2>
                <div class="card">
                    <div class="card-body">
                        <form action="modifier_livre.php" method="post">
                            <input type="hidden" name="isbn" value="<?= htmlspecialchars($livre['isbn'], ENT_QUOTES, 'UTF-8') ?>">
                            <div class="form-group">
                                <label for="titre">Titre</label>
                                <input type="text" class="form-control" id="titre" name="titre" value="<?= htmlspecialchars($livre['titre'], ENT_QUOTES, 'UTF-8') ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="auteur">Auteur</label>
                                <input type="text" class="form-control" id="auteur" name="auteur" value="<?= htmlspecialchars($livre['auteur'], ENT_QUOTES, 'UTF-8') ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="annee_publication">Année de Publication</label>
                                <input type="number" class="form-control" id="annee_publication" name="annee_publication" value="<?= htmlspecialchars($livre['annee_publication'], ENT_QUOTES, 'UTF-8') ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="genre">Genre</label>
                                <input type="text" class="form-control" id="genre" name="genre" value="<?= htmlspecialchars($livre['genre'], ENT_QUOTES, 'UTF-8') ?>" required>
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
