<?php include('assets/includes/header.php'); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Projet 2 - Connexion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Connexion</h1>
        <form action="bio.php" method="post">
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Se connecter</button>
        </form>
        <?php 
        if (isset($_GET['error']) && $_GET['error'] == 1) {
            echo '<p class="error-message">Mot de passe incorrect. Veuillez réessayer.</p>';
        }
        ?>
    </div>
    <?php include('assets/includes/footer.php'); ?>
</body>
</html>
