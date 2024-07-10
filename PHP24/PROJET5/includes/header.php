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
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <title>Gestion de Bibliothèque</title>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="index.php">
            <img src="assets/images/logo.png" alt="Logo"> Bibliothèque
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="livresDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-book"></i> Livres
                    </a>
                    <div class="dropdown-menu" aria-labelledby="livresDropdown">
                        <a class="dropdown-item" href="afficher_livres.php">Afficher tous les livres</a>
                        <a class="dropdown-item" href="ajouter_livre.php">Ajouter un livre</a>
                        <a class="dropdown-item" href="modifier_livre.php">Modifier un livre</a>
                        <a class="dropdown-item" href="supprimer_livre.php">Supprimer un livre</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="membresDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-users"></i> Membres
                    </a>
                    <div class="dropdown-menu" aria-labelledby="membresDropdown">
                        <a class="dropdown-item" href="afficher_membres.php">Afficher tous les membres</a>
                        <a class="dropdown-item" href="ajouter_membre.php">Ajouter un membre</a>
                        <a class="dropdown-item" href="modifier_membre.php">Modifier un membre</a>
                        <a class="dropdown-item" href="supprimer_membre.php">Supprimer un membre</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="empruntsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-book-reader"></i> Emprunts
                    </a>
                    <div class="dropdown-menu" aria-labelledby="empruntsDropdown">
                        <a class="dropdown-item" href="afficher_emprunts.php">Afficher tous les emprunts</a>
                        <a class="dropdown-item" href="ajouter_emprunt.php">Ajouter un emprunt</a>
                        <a class="dropdown-item" href="modifier_emprunt.php">Modifier un emprunt</a>
                        <a class="dropdown-item" href="supprimer_emprunt.php">Supprimer un emprunt</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i> Administration
                    </a>
                    <div class="dropdown-menu" aria-labelledby="adminDropdown">
                        <a class="dropdown-item" href="afficher_utilisateurs.php">Afficher tous les utilisateurs</a>
                        <a class="dropdown-item" href="register.php">Ajouter un utilisateur</a>
                        <a class="dropdown-item" href="supprimer_utilisateur.php">Supprimer un utilisateur</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i> <?php echo htmlspecialchars($username); ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="modifier_profil.php">Modifier Profil</a>
                        <a class="dropdown-item" href="logout.php">Déconnexion</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</body>
</html>
