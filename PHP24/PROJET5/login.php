<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Se connecter</title>
</head>
<body>
    <div class="auth-container">
        <div class="auth-left"></div>
        <div class="auth-right">
            <h2>Se connecter</h2>
            <form action="login.php" method="post">
                <label for="username">Nom utilisateur</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Se connecter</button>
            </form>
            <p>Si vous n'avez pas de compte, <a href="register.php">inscrivez-vous ici</a>.</p>
        </div>
    </div>
</body>
</html>
