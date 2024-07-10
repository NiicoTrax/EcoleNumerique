<?php
include 'auth.php';
require_once 'includes/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $date_adhesion = $_POST['date_adhesion'];

    $stmt = $pdo->prepare("INSERT INTO membres (nom, email, date_adhesion) VALUES (?, ?, ?)");
    $stmt->execute([$nom, $email, $date_adhesion]);

    header('Location: afficher_membres.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<?php include 'includes/header.php'; ?>
    <title>Ajouter un Membre</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            
            <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h2 class="mt-4">Ajouter un Membre</h2>
                <div class="card">
                    <div class="card-body">
                        <form action="ajouter_membre.php" method="post">
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="date_adhesion">Date d'Adhésion</label>
                                <input type="date" class="form-control" id="date_adhésion" name="date_adhesion" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>
