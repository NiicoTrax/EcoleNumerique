<?php $pageTitle = "Connexion"; ?>
<?php require 'assets/includes/header.php'; ?>

<?php
    if (isset($_GET['error']) && $_GET['error'] == 1) {
        echo '<p style="color: red;">Erreur lors de la connexion ! Veuillez vérifier vos informations !</p>';
    }
    ?>

    <form action="exec_connexion.php" method="post">
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required><br>
        <button type="submit">Se connecter</button>
    </form>

<?php require 'assets/includes/footer.php'; ?>











