<?php
require_once 'includes/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action === 'ajouter') {
            $nom = $_POST['nom'];
            $email = $_POST['email'];
            $dateAdhesion = $_POST['date_adhesion'];
            $membre = new Membre(null, $nom, $email, $dateAdhesion);
            $bibliotheque->ajouterMembre($membre);
        } elseif ($action === 'supprimer') {
            $id = $_POST['id'];
            $bibliotheque->supprimerMembre($id);
        } elseif ($action === 'rechercher') {
            $critere = $_POST['critere'];
            $valeur = $_POST['valeur'];
            if ($critere === 'nom') {
                $resultat = $bibliotheque->rechercherMembreParNom($valeur);
            } elseif ($critere === 'email') {
                $resultat = $bibliotheque->rechercherMembreParEmail($valeur);
            }
        }
    }
}
$tousLesMembres = $bibliotheque->listerTousLesMembres();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Gestion des Membres</title>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <?php include 'includes/sidebar.php'; ?>
            <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h2 class="mt-4">Gestion des Membres</h2>
                <div class="card mb-4">
                    <div class="card-header">Ajouter un Membre</div>
                    <div class="card-body">
                        <form action="membres.php" method="post">
                            <input type="hidden" name="action" value="ajouter">
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
                                <input type="date" class="form-control" id="date_adhesion" name="date_adhesion" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </form>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Supprimer un Membre</div>
                    <div class="card-body">
                        <form action="membres.php" method="post">
                            <input type="hidden" name="action" value="supprimer">
                            <div class="form-group">
                                <label for="id">ID</label>
                                <input type="number" class="form-control" id="id" name="id" required>
                            </div>
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Rechercher un Membre</div>
                    <div class="card-body">
                        <form action="membres.php" method="post">
                            <input type="hidden" name="action" value="rechercher">
                            <div class="form-group">
                                <label for="critere">Critère</label>
                                <select id="critere" name="critere" class="form-control">
                                    <option value="nom">Nom</option>
                                    <option value="email">Email</option>
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
                                <p><strong>ID :</strong> <?= htmlspecialchars($resultat->getId(), ENT_QUOTES, 'UTF-8') ?></p>
                                <p><strong>Nom :</strong> <?= htmlspecialchars($resultat->getNom(), ENT_QUOTES, 'UTF-8') ?></p>
                                <p><strong>Email :</strong> <?= htmlspecialchars($resultat->getEmail(), ENT_QUOTES, 'UTF-8') ?></p>
                                <p><strong>Date d'Adhésion :</strong> <?= htmlspecialchars($resultat->getDateAdhesion(), ENT_QUOTES, 'UTF-8') ?></p>
                            <?php else : ?>
                                <p>Aucun membre trouvé pour ce critère.</p>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Liste de Tous les Membres</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Date d'Adhésion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tousLesMembres as $membre) : ?>
                                    <tr>
                                        <td><?= htmlspecialchars($membre->getId(), ENT_QUOTES, 'UTF-8') ?></td>
                                        <td><?= htmlspecialchars($membre->getNom(), ENT_QUOTES, 'UTF-8') ?></td>
                                        <td><?= htmlspecialchars($membre->getEmail(), ENT_QUOTES, 'UTF-8') ?></td>
                                        <td><?= htmlspecialchars($membre->getDateAdhesion(), ENT_QUOTES, 'UTF-8') ?></td>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
