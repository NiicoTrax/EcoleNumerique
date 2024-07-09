<?php
require_once 'includes/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $date_adhesion = $_POST['date_adhesion'];

    $stmt = $pdo->prepare("UPDATE membres SET nom = ?, email = ?, date_adhesion = ? WHERE id = ?");
    $stmt->execute([$nom, $email, $date_adhesion, $id]);

    header('Location: afficher_membres.php');
    exit();
}

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM membres WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $membre = $stmt->fetch();

    if (!$membre) {
        die("Membre non trouvé.");
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.amazonaws.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Modifier un Membre</title>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include 'includes/sidebar.php'; ?>
            <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h2 class="mt-4">Modifier un Membre</h2>
                <div class="card">
                    <div class="card-body">
                        <form action="modifier_membre.php" method="post">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($membre['id'], ENT_QUOTES, 'UTF-8') ?>">
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" value="<?= htmlspecialchars($membre['nom'], ENT_QUOTES, 'UTF-8') ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($membre['email'], ENT_QUOTES, 'UTF-8') ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="date_adhesion">Date d'Adhésion</label>
                                <input type="date" class="form-control" id="date_adhesion" name="date_adhesion" value="<?= htmlspecialchars($membre['date_adhesion'], ENT_QUOTES, 'UTF-8') ?>" required>
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
