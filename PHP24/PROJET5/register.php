<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Inscription</title>
</head>
<body>
    <div class="auth-container">
        <div class="auth-right">
            <h2>S'inscrire</h2>
            <form action="register.php" method="post">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" required>
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" required>
                <label for="telephone">Téléphone</label>
                <input type="tel" id="telephone" name="telephone" required>
                <label for="username">Nom utilisateur</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
                <label for="code">Code (CIN ou CNE)</label>
                <input type="text" id="code" name="code" required>
                <label for="adresse">Adresse</label>
                <input type="text" id="adresse" name="adresse" required>
                <label for="role">Rôle</label>
                <select id="role" name="role" required>
                    <option value="etudiant">Étudiant(e)</option>
                    <option value="professeur">Professeur</option>
                    <option value="personne">Personne</option>
                </select>
                <button type="submit">S'inscrire</button>
            </form>
            <p>Si vous avez déjà un compte, <a href="login.php">connectez-vous ici</a>.</p>
        </div>
        <div class="auth-left"></div>
    </div>
</body>
</html>
