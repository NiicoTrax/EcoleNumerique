<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="./assets/css/styles.css">
</head>
<body>
    <div class="main-container">
        <nav>
            <ul class="menu">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="index.php#types">Types de Randonnées</a></li>
                <li><a href="index.php#best">Meilleures Randonnées</a></li>
                <li><a href="index.php#tips">Conseils</a></li>
                <?php if (isset($_SESSION['user'])): ?>
                    <li><a href="espaces_randonnees.php">Espace Randonnées</a></li>
                <?php endif; ?>
            </ul>
            <?php if (isset($_SESSION['user'])): ?>
                <a href="deconnexion.php" class="login-button">déconnection</a>
            <?php else: ?>
                <a href="connexion.php" class="login-button">Connexion</a>
            <?php endif; ?>
        </nav>
        <header>
            <h1>Randonnées à l'île de la Réunion</h1>
        </header>
        <div class="container">
