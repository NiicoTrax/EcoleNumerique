<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Inscription</h1>
        <form action="traitement_inscription.php" method="POST">
            <label for="nom_utilisateur">Nom d'utilisateur:</label>
            <input type="text" id="nom_utilisateur" name="nom_utilisateur" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="mot_de_passe">Mot de passe:</label>
            <input type="password" id="mot_de_passe" name="mot_de_passe" required>
            <button type="submit" class="button">S'inscrire</button>
        </form>
        <a href="connexion.php">Déjà inscrit ? Se connecter</a>
    </div>
</body>
</html>
