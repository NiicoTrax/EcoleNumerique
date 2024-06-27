<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Connexion</h1>
        <form action="traitement_connexion.php" method="POST">
            <label for="identifiant">Nom d'utilisateur ou Email:</label>
            <input type="text" id="identifiant" name="identifiant" required>
            <label for="mot_de_passe">Mot de passe:</label>
            <input type="password" id="mot_de_passe" name="mot_de_passe" required>
            <button type="submit" class="button">Se connecter</button>
        </form>
        <a href="inscription.php">Pas encore inscrit ? Créer un compte</a>
    </div>
</body>
</html>
