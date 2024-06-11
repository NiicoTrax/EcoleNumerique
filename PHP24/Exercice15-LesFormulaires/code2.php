<!-- code2.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Données Formulaire avec Fichier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = $_POST;
        if (isset($data['civilite']) && isset($data['nom']) && isset($data['prenom']) && isset($_FILES['file'])) {
            $civilite = htmlspecialchars($data['civilite']);
            $nom = htmlspecialchars($data['nom']);
            $prenom = htmlspecialchars($data['prenom']);
            $file = $_FILES['file'];

            
            $fileExt = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

            if ($fileExt == 'pdf') {
                $fileName = $file['name'];

                echo "Civilité: " . $civilite . "<br>";
                echo "Nom: " . $nom . "<br>";
                echo "Prénom: " . $prenom . "<br>";
                echo "Fichier: " . $fileName . "<br>";
                echo "Extension: " . $fileExt;
            } else {
                echo "Le fichier doit être un PDF.";
            }
        } else {
            echo "Aucune donnée reçue.";
        }
    } else {
    ?>
    <form action="code2.php" method="post" enctype="multipart/form-data">
        <label for="civilite">Civilité:</label>
        <select id="civilite" name="civilite" required>
            <option value="Mr">Mr</option>
            <option value="Mme">Mme</option>
        </select><br>
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br>
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" required><br>
        <label for="file">Fichier:</label>
        <input type="file" id="file" name="file" required><br>
        <input type="submit" value="Envoyer">
    </form>
    <?php
    }
    ?>
</body>
</html>
