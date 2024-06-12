<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['new_login']) && isset($_POST['new_password'])) {
    $new_login = $_POST['new_login'];
    $new_password = $_POST['new_password'];
    setcookie('login', $new_login, time() + (86400 * 30), "/");
    setcookie('password', $new_password, time() + (86400 * 30), "/");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier le Cookie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Modifier le Cookie</h1>
    <form method="post" action="">
        <label for="new_login">Nouveau Login:</label>
        <input type="text" id="new_login" name="new_login" required>
        <br>
        <label for="new_password">Nouveau Mot de passe:</label>
        <input type="password" id="new_password" name="new_password" required>
        <br>
        <button type="submit">Modifier</button>
    </form>
</body>
</html>
