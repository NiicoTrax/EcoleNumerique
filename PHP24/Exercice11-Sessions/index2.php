<?php
// Démarrer la session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Page Index2</title>
</head>
<body>
    <h1>Bienvenue sur la page Index2</h1>
    <p>La valeur de la variable de session 'couleur' est : 
        <?php
        // Afficher la variable de session
        if (isset($_SESSION['couleur'])) {
            echo $_SESSION['couleur'];
        } else {
            echo 'La variable de session "couleur" n\'est pas définie.';
        }
        ?>
    </p>
    <p><a href="index.php">Retourner à la page Index</a></p>
</body>
</html>
