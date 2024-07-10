<?php
include 'auth.php';
require_once 'includes/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isbn = $_POST['isbn'];
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $annee_publication = $_POST['annee_publication'];
    $genre = $_POST['genre'];

    $stmt = $pdo->prepare("INSERT INTO livres (isbn, titre, auteur, annee_publication, genre) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$isbn, $titre, $auteur, $annee_publication, $genre]);

    header('Location: afficher_livres.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<?php include 'includes/header.php'; ?>
    <title>Ajouter un Livre</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            
            <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h2 class="mt-4">Ajouter un Livre</h2>
                <div class="card">
                    <div class="card-body">
                        <form action="ajouter_livre.php" method="post">
                            <div class="form-group">
                                <label for="isbn">ISBN</label>
                                <input type="text" class="form-control" id="isbn" name="isbn" required>
                            </div>
                            <div class="form-group">
                                <label for="titre">Titre</label>
                                <input type="text" class="form-control" id="titre" name="titre" required>
                            </div>
                            <div class="form-group">
                                <label for="auteur">Auteur</label>
                                <input type="text" class="form-control" id="auteur" name="auteur" required>
                            </div>
                            <div class="form-group">
                                <label for="annee_publication">Année de Publication</label>
                                <input type="number" class="form-control" id="annee_publication" name="annee_publication" required>
                            </div>
                            <div class="form-group">
                                <label for="genre">Genre</label>
                                <input type="text" class="form-control" id="genre" name="genre" required>
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
