<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Données Formulaire Complet</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET') {
        $data = $_SERVER['REQUEST_METHOD'] == 'POST' ? $_POST : $_GET;
        if (isset($data['civilite']) && isset($data['nom']) && isset($data['prenom'])) {
            $civilite = htmlspecialchars($data['civilite']);
            $nom = htmlspecialchars($data['nom']);
            $prenom = htmlspecialchars($data['prenom']);
            echo "Civilité: " . $civilite . "<br>";
            echo "Nom: " . $nom . "<br>";
            echo "Prénom: " . $prenom;
        } else {
            echo "Aucune donnée reçue.";
        }
    } else {
    ?>
    <form action="code.php" method="post">
        <label for="civilite">Civilité:</label>
        <select id="civilite" name="civilite" required>
            <option value="Mr">Mr</option>
            <option value="Mme">Mme</option>
        </select><br>
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br>
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" required><br>
        <input type="submit" value="Envoyer">
    </form>
    <?php
    }
    ?>
</body>
</html>
