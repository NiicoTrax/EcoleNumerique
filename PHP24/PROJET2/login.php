<?php include('assets/includes/header.php'); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Projet 2 - Connexion</title>
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
            echo '<p class="error-message"><i class="fa-solid fa-triangle-exclamation" style="color: #ff0000;"></i> Mot de passe incorrect. Veuillez réessayer.</p>';
        }
        ?>
    </div>
    <?php include('assets/includes/footer.php'); ?>
    <script src="assets/js/script.js"></script>
</body>
</html>
