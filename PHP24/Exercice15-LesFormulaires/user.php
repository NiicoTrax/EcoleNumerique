<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Données Formulaires</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Données GET</h2>
    <?php
    if (isset($_GET['nom']) && isset($_GET['prenom'])) {
        $nom = htmlspecialchars($_GET['nom']);
        $prenom = htmlspecialchars($_GET['prenom']);
        echo "Nom: " . $nom . "<br>";
        echo "Prénom: " . $prenom . "<br>";
    } else {
        echo "Aucune donnée reçue via GET.<br>";
    }
    ?>

    <h2>Données POST</h2>
    <?php
    if (isset($_POST['nom']) && isset($_POST['prenom'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        echo "Nom: " . $nom . "<br>";
        echo "Prénom: " . $prenom . "<br>";
    } else {
        echo "Aucune donnée reçue via POST.";
    }
    ?>
</body>
</html>
