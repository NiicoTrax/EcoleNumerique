<?php
session_start();
$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];
$age = $_SESSION['age'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page 2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Informations de la Session</h1>
    <p><strong>Nom:</strong> <?php echo $nom; ?></p>
    <p><strong>Prénom:</strong> <?php echo $prenom; ?></p>
    <p><strong>Âge:</strong> <?php echo $age; ?></p>
</body>
</html>
