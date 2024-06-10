
<?php
// Démarrer la session
session_start();

// Définir la variable de session
$_SESSION['couleur'] = 'rouge';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Page Index</title>
</head>
<body>
    <h1>Bienvenue sur la page Index</h1>
    <p>La variable de session 'couleur' a été définie à 'rouge'.</p>
    <p><a href="index2.php">Aller à la page Index2</a></p>
</body>
</html>









