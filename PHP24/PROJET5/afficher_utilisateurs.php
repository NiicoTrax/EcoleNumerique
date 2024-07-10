<?php
include 'auth.php';
include 'includes/header.php';
include 'config/database.php'; // Inclusion du fichier de configuration de la base de données

// Récupérer tous les utilisateurs
$sql = "SELECT * FROM users";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <title>Liste des utilisateurs</title>
</head>
<body>
    <div class="container">
        <h2>Liste des utilisateurs</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom d'utilisateur</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user['id']); ?></td>
                        <td><?php echo htmlspecialchars($user['username']); ?></td>
                        <td>
                            <a href="modifier_utilisateur.php?id=<?php echo $user['id']; ?>" class="btn btn-warning">Modifier</a>
                            <a href="supprimer_utilisateur.php?id=<?php echo $user['id']; ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="register.php" class="btn btn-primary">Ajouter un utilisateur</a>
    </div>
</body>
</html>
