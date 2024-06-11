<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercices PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Exercice 1: Formulaire GET</h2>
    <form action="user.php" method="get">
        <label for="nom_get">Nom:</label>
        <input type="text" id="nom_get" name="nom" required><br>
        <label for="prenom_get">Prénom:</label>
        <input type="text" id="prenom_get" name="prenom" required><br>
        <input type="submit" value="Envoyer">
    </form>

    <h2>Exercice 2: Formulaire POST</h2>
    <form action="user.php" method="post">
        <label for="nom_post">Nom:</label>
        <input type="text" id="nom_post" name="nom" required><br>
        <label for="prenom_post">Prénom:</label>
        <input type="text" id="prenom_post" name="prenom" required><br>
        <input type="submit" value="Envoyer">
    </form>

    <h2>Exercice 5: Formulaire complet</h2>
    <form action="code.php" method="post">
        <label for="civilite">Civilité:</label>
        <select id="civilite" name="civilite" required>
            <option value="Mr">Mr</option>
            <option value="Mme">Mme</option>
        </select><br>
        <label for="nom_complet">Nom:</label>
        <input type="text" id="nom_complet" name="nom" required><br>
        <label for="prenom_complet">Prénom:</label>
        <input type="text" id="prenom_complet" name="prenom" required><br>
        <input type="submit" value="Envoyer">
    </form>

    <h2>Exercice 7: Formulaire avec fichier</h2>
    <form action="code2.php" method="post" enctype="multipart/form-data">
        <label for="civilite_file">Civilité:</label>
        <select id="civilite_file" name="civilite" required>
            <option value="Mr">Mr</option>
            <option value="Mme">Mme</option>
        </select><br>
        <label for="nom_file">Nom:</label>
        <input type="text" id="nom_file" name="nom" required><br>
        <label for="prenom_file">Prénom:</label>
        <input type="text" id="prenom_file" name="prenom" required><br>
        <label for="file">Fichier:</label>
        <input type="file" id="file" name="file" required><br>
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>
