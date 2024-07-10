<?php
include 'auth.php';
require_once 'includes/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action === 'ajouter') {
            $isbn = $_POST['isbn'];
            $titre = $_POST['titre'];
            $auteur = $_POST['auteur'];
            $annee = $_POST['annee'];
            $genre = $_POST['genre'];
            $livre = new Livre($isbn, $titre, $auteur, $annee, $genre);
            $bibliotheque->ajouterLivre($livre);
        } elseif ($action === 'supprimer') {
            $isbn = $_POST['isbn'];
            $bibliotheque->supprimerLivre($isbn);
        } elseif ($action === 'rechercher') {
            $critere = $_POST['critere'];
            $valeur = $_POST['valeur'];
            if ($critere === 'titre') {
                $resultat = $bibliotheque->rechercherLivreParTitre($valeur);
            } elseif ($critere === 'auteur') {
                $resultat = $bibliotheque->rechercherLivreParAuteur($valeur);
            }
        }
    }
}
$tousLesLivres = $bibliotheque->listerTousLesLivres();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include 'includes/header.php'; ?>
    <title>Gestion des Livres</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            
            <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h2 class="mt-4">Gestion des Livres</h2>
                <div class="card mb-4">
                    <div class="card-header">Ajouter un Livre</div>
                    <div class="card-body">
                        <form action="livres.php" method="post">
                            <input type="hidden" name="action" value="ajouter">
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
                                <label for="annee">Année de Publication</label>
                                <input type="number" class="form-control" id="annee" name="annee" required>
                            </div>
                            <div class="form-group">
                                <label for="genre">Genre</label>
                                <input type="text" class="form-control" id="genre" name="genre" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </form>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Supprimer un Livre</div>
                    <div class="card-body">
                        <form action="livres.php" method="post">
                            <input type="hidden" name="action" value="supprimer">
                            <div class="form-group">
                                <label for="isbn">ISBN</label>
                                <input type="text" class="form-control" id="isbn" name="isbn" required>
                            </div>
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Rechercher un Livre</div>
                    <div class="card-body">
                        <form action="livres.php" method="post">
                            <input type="hidden" name="action" value="rechercher">
                            <div class="form-group">
                                <label for="critere">Critère</label>
                                <select id="critere" name="critere" class="form-control">
                                    <option value="titre">Titre</option>
                                    <option value="auteur">Auteur</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="valeur">Valeur</label>
                                <input type="text" class="form-control" id="valeur" name="valeur" required>
                            </div>
                            <button type="submit" class="btn btn-info">Rechercher</button>
                        </form>
                        <?php if (isset($resultat)) : ?>
                            <h3 class="mt-4">Résultat de la recherche :</h3>
                            <?php if ($resultat) : ?>
                                <p><strong>ISBN :</strong> <?= htmlspecialchars($resultat->getIsbn(), ENT_QUOTES, 'UTF-8') ?></p>
                                <p><strong>Titre :</strong> <?= htmlspecialchars($resultat->getTitre(), ENT_QUOTES, 'UTF-8') ?></p>
                                <p><strong>Auteur :</strong> <?= htmlspecialchars($resultat->getAuteur(), ENT_QUOTES, 'UTF-8') ?></p>
                                <p><strong>Année de Publication :</strong> <?= htmlspecialchars($resultat->getAnneePublication(), ENT_QUOTES, 'UTF-8') ?></p>
                                <p><strong>Genre :</strong> <?= htmlspecialchars($resultat->getGenre(), ENT_QUOTES, 'UTF-8') ?></p>
                            <?php else : ?>
                                <p>Aucun livre trouvé pour ce critère.</p>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Liste de Tous les Livres</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ISBN</th>
                                    <th>Titre</th>
                                    <th>Auteur</th>
                                    <th>Année</th>
                                    <th>Genre</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tousLesLivres as $livre) : ?>
                                    <tr>
                                        <td><?= htmlspecialchars($livre->getIsbn(), ENT_QUOTES, 'UTF-8') ?></td>
                                        <td><?= htmlspecialchars($livre->getTitre(), ENT_QUOTES, 'UTF-8') ?></td>
                                        <td><?= htmlspecialchars($livre->getAuteur(), ENT_QUOTES, 'UTF-8') ?></td>
                                        <td><?= htmlspecialchars($livre->getAnneePublication(), ENT_QUOTES, 'UTF-8') ?></td>
                                        <td><?= htmlspecialchars($livre->getGenre(), ENT_QUOTES, 'UTF-8') ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>
