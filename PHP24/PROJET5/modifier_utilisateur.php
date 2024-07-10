<?php
include 'auth.php';
include 'includes/header.php';
include 'config/database.php'; // Inclusion du fichier de configuration de la base de données

// Initialisation du message de confirmation
$message = '';

// Récupération des informations de l'utilisateur à modifier
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_id]);
    $user = $stmt->fetch();

    if (!$user) {
        die("Utilisateur non trouvé.");
    }
} else {
    die("ID utilisateur manquant.");
}

// Traitement du formulaire de modification
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_BCRYPT) : $user['password'];

    $sql = "UPDATE users SET username = ?, password = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $password, $user_id]);

    $message = "Utilisateur modifié avec succès.";
    // Actualiser les informations de l'utilisateur
    $user['username'] = $username;
    $user['password'] = $password;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <title>Modifier un utilisateur</title>
</head>
<body>
    <div class="container">
        <h2>Modifier un utilisateur</h2>
        <?php if ($message): ?>
            <div class="alert alert-success"><?php echo $message; ?></div>
        <?php endif; ?>
        <form method="POST" action="modifier_utilisateur.php?id=<?php echo $user_id; ?>">
            <div class="form-group">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username" name="username" class="form-control" value="<?php echo htmlspecialchars($user['username']); ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe (laisser vide pour ne pas changer)</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
    <?php
include 'includes/footer.php';
?>
</body>
</html>
