<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'config/database.php';

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

// Récupérer les statistiques
$stmt = $pdo->query("SELECT COUNT(*) FROM livres");
$nombre_livres = $stmt->fetchColumn();

$stmt = $pdo->query("SELECT COUNT(*) FROM membres");
$nombre_membres = $stmt->fetchColumn();

$stmt = $pdo->query("SELECT COUNT(*) FROM emprunts");
$nombre_emprunts = $stmt->fetchColumn();

// Récupérer les livres empruntés (limité à 5)
$stmt = $pdo->query("
    SELECT e.id, l.titre, l.auteur, e.date_emprunt, e.date_retour 
    FROM emprunts e 
    JOIN livres l ON e.id_livre = l.id 
    ORDER BY e.date_emprunt DESC 
    LIMIT 5
");
$livres_empruntes = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Récupérer les livres disponibles (limité à 5)
$currentDate = date('Y-m-d');
$stmt = $pdo->query("
    SELECT l.id, l.titre, l.auteur 
    FROM livres l 
    LEFT JOIN emprunts e ON l.id = e.id_livre AND e.date_retour > '$currentDate'
    WHERE e.id IS NULL 
    LIMIT 5
");
$livres_disponibles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <title>Gestion de Bibliothèque</title>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <div id="main-content" class="container mt-4">
        <h1 class="mb-4">Dashboard</h1>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card-custom card-primary">
                    <div class="card-body d-flex flex-column align-items-center">
                        <div>
                            <i class="fas fa-book icon"></i>
                        </div>
                        <div>
                            <h5 class="card-title">Livres</h5>
                            <p class="card-text">Nombre de livres : <?php echo $nombre_livres; ?></p>
                            <a href="afficher_livres.php" class="btn btn-light">Voir détails</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card-custom card-warning">
                    <div class="card-body d-flex flex-column align-items-center">
                        <div>
                            <i class="fas fa-users icon"></i>
                        </div>
                        <div>
                            <h5 class="card-title">Membres</h5>
                            <p class="card-text">Nombre de membres : <?php echo $nombre_membres; ?></p>
                            <a href="afficher_membres.php" class="btn btn-light">Voir détails</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card-custom card-success">
                    <div class="card-body d-flex flex-column align-items-center">
                        <div>
                            <i class="fas fa-book-reader icon"></i>
                        </div>
                        <div>
                            <h5 class="card-title">Emprunts</h5>
                            <p class="card-text">Nombre d'emprunts : <?php echo $nombre_emprunts; ?></p>
                            <a href="afficher_emprunts.php" class="btn btn-light">Voir détails</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h2>Livres Empruntés Récemment</h2>
        <div class="table-wrapper">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Auteur</th>
                        <th>Date d'emprunt</th>
                        <th>Date de retour</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($livres_empruntes as $livre): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($livre['titre']); ?></td>
                            <td><?php echo htmlspecialchars($livre['auteur']); ?></td>
                            <td><?php echo htmlspecialchars($livre['date_emprunt']); ?></td>
                            <td><?php echo htmlspecialchars($livre['date_retour']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <a href="afficher_emprunts.php" class="btn btn-primary">Voir tous les emprunts</a>

        <h2 class="mt-4">Livres Disponibles</h2>
        <div class="table-wrapper">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Auteur</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($livres_disponibles as $livre): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($livre['titre']); ?></td>
                            <td><?php echo htmlspecialchars($livre['auteur']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <a href="afficher_livres.php" class="btn btn-primary">Voir tous les livres disponibles</a>
    </div>

    <?php include 'includes/footer.php'; ?>

</body>
</html>
