<?php
session_start();
if (!isset($_SESSION['utilisateur_id'])) {
    header('Location: connexion.php');
    exit;
}

require 'db.php';

$user_id = $_SESSION['utilisateur_id'];

$sql = "SELECT * FROM utilisateurs WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$user_id]);
$user = $stmt->fetch();

$sql = "SELECT COUNT(*) AS user_count FROM utilisateurs";
$stmt = $pdo->query($sql);
$user_count = $stmt->fetch()['user_count'];

$sql = "SELECT id, nom_utilisateur, email FROM utilisateurs";
$stmt = $pdo->query($sql);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord</title>
    <link rel="stylesheet" href="bord.css">
</head>
<body>
    <div class="dashboard-container">
        <aside class="sidebar">
            <div class="profile">
                <img src="profile.png" alt="Profil de l'utilisateur">
                <h2><?php echo htmlspecialchars($user['nom_utilisateur']); ?></h2>
                <p><?php echo htmlspecialchars($user['email']); ?></p>
                <a href="deconnexion.php" class="button">Déconnexion</a>
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Mes Projets</a></li>
                    <li><a href="#">Mes Tâches</a></li>
                    <li><a href="#">Mes Clients</a></li>
                    <li><a href="#">Mes Documents</a></li>
                    <li><a href="#">Ma Messagerie</a></li>
                </ul>
            </nav>
        </aside>
        <main class="main-content">
            <header>
                <h1>Bienvenue sur votre espace client, <?php echo htmlspecialchars($user['nom_utilisateur']); ?>!</h1>
            </header>
            <section class="dashboard-widgets">
                <div class="widget">
                    <div class="widget-icon blue"><i class="fas fa-project-diagram"></i></div>
                    <div class="widget-info">
                        <h3>5</h3>
                        <p>Projets en cours</p>
                    </div>
                </div>
                <div class="widget">
                    <div class="widget-icon purple"><i class="fas fa-tasks"></i></div>
                    <div class="widget-info">
                        <h3>12</h3>
                        <p>Tâches à réaliser</p>
                    </div>
                </div>
                <div class="widget">
                    <div class="widget-icon green"><i class="fas fa-users"></i></div>
                    <div class="widget-info">
                        <h3>8</h3>
                        <p>Clients actifs</p>
                    </div>
                </div>
                <div class="widget">
                    <div class="widget-icon teal"><i class="fas fa-file-alt"></i></div>
                    <div class="widget-info">
                        <h3>30</h3>
                        <p>Documents</p>
                    </div>
                </div>
                <div class="widget">
                    <div class="widget-icon orange"><i class="fas fa-comments"></i></div>
                    <div class="widget-info">
                        <h3>4</h3>
                        <p>Messages non lus</p>
                    </div>
                </div>
                <div class="widget">
                    <div class="widget-icon red"><i class="fas fa-bell"></i></div>
                    <div class="widget-info">
                        <h3>2</h3>
                        <p>Notifications</p>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
