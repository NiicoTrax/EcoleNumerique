<?php $pageTitle = "Connexion"; ?>
<?php include 'header.php'; ?>

<form action="exec_connexion.php" method="post">
    <h2>Connexion</h2>
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <label for="password">Mot de passe:</label>
    <input type="password" name="password" required>
    <input type="submit" value="Se connecter">
</form>

<?php include 'footer.php'; ?>
