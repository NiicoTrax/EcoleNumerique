<?php
session_start();

// Récupération des informations utilisateur
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$ip_address = $_SERVER['REMOTE_ADDR'];
$server_name = $_SERVER['SERVER_NAME'];

// Définir les variables de session pour l'exercice 2
$_SESSION['nom'] = "Dupont";
$_SESSION['prenom'] = "Jean";
$_SESSION['age'] = 30;

// Gestion du formulaire de connexion pour l'exercice 3
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login']) && isset($_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    setcookie('login', $login, time() + (86400 * 30), "/");
    setcookie('password', $password, time() + (86400 * 30), "/");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page d'Index</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Informations Utilisateur</h1>
    <section>
        <h2>Exercice 1: Informations Utilisateur</h2>
        <p><strong>User Agent:</strong> <?php echo $user_agent; ?></p>
        <p><strong>Adresse IP:</strong> <?php echo $ip_address; ?></p>
        <p><strong>Nom du Serveur:</strong> <?php echo $server_name; ?></p>
    </section>

    <section>
        <h2>Exercice 2: Lien vers une autre page</h2>
        <a href="page2.php">Page 2</a>
    </section>

    <section>
        <h2>Exercice 3: Formulaire de Connexion</h2>
        <form method="post" action="">
            <label for="login">Login:</label>
            <input type="text" id="login" name="login" required>
            <br>
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <button type="submit">Se connecter</button>
        </form>
    </section>

    <section>
        <h2>Exercice 4 et 5</h2>
        <a href="cookie_info.php">Afficher les informations du cookie</a><br>
        <a href="modify_cookie.php">Modifier le cookie</a>
    </section>
</body>
</html>
