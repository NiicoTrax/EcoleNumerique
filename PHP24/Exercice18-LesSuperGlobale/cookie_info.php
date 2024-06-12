<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Informations Cookie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Informations du Cookie</h1>
    <?php
    if(isset($_COOKIE['login']) && isset($_COOKIE['password'])) {
        echo "<p><strong>Login:</strong> " . $_COOKIE['login'] . "</p>";
        echo "<p><strong>Mot de passe:</strong> " . $_COOKIE['password'] . "</p>";
    } else {
        echo "<p>Aucun cookie trouvé.</p>";
    }
    ?>
</body>
</html>
