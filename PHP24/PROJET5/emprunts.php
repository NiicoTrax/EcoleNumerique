<?php
include 'auth.php';
require_once 'includes/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action === 'ajouter') {
            $idLivre = $_POST['id_livre'];
            $idMembre = $_POST['id_membre'];
            $dateEmprunt = $_POST['date_emprunt'];
            $dateRetour = $_POST['date_retour'];
            $emprunt = new Emprunt(null, $idLivre, $idMembre, $dateEmprunt, $dateRetour);
            $bibliotheque->ajouterEmprunt($emprunt);
        } elseif ($action === 'supprimer') {
            $id = $_POST['id'];
            $bibliotheque->supprimerEmprunt($id);
        } elseif ($action === 'rechercher') {
            $critere = $_POST['critere'];
            $valeur = $_POST['valeur'];
            if ($critere === 'id_livre') {
                $resultat = $bibliotheque->rechercherEmpruntParIdLivre($valeur);
            } elseif ($critere === 'id_membre') {
                $resultat = $bibliotheque->rechercherEmpruntParIdMembre($valeur);
            }
        }
    }
}
$tousLesEmprunts = $bibliotheque->listerTousLesEmprunts();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<?php include 'includes/header.php'; ?>
    <title>Gestion des Emprunts</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            
            <main class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h2 class="mt-4">Gestion des Emprunts</h2>
                <div class="card mb-4">
                    <div class="card-header">Ajouter un Emprunt</div>
                    <div class="card-body">
                        <form action="emprunts.php" method="post">
                            <input type="hidden" name="action" value="ajouter">
                            <div class="form-group">
                                <label for="id_livre">ID Livre</label>
                                <input type="number" class="form-control" id="id_livre" name="id_livre" required>
                            </div>
                            <div class="form-group">
                                <label for="id_membre">ID Membre</label>
                                <input type="number" class="form-control" id="id_membre" name="id_membre" required>
                            </div>
                            <div class="form-group">
                                <label for="date_emprunt">Date d'Emprunt</label>
                                <input type="date" class="form-control" id="date_emprunt" name="date_emprunt" required>
                            </div>
                            <div class="form-group">
                                <label for="date_retour">Date de Retour</label>
                                <input type="date" class="form-control" id="date_retour" name="date_retour" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </form>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Supprimer un Emprunt</div>
                    <div class="card-body">
                        <form action="emprunts.php" method="post">
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
                    <div class="card-header">Rechercher un Emprunt</div>
                    <div class="card-body">
                        <form action="emprunts.php" method="post">
                            <input type="hidden" name="action" value="rechercher">
                            <div class="form-group">
                                <label for="critere">Critère</label>
                                <select id="critere" name="critere" class="form-control">
                                    <option value="id_livre">ID Livre</option>
                                    <option value="id_membre">ID Membre</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="valeur">Valeur</label>
                                <input type="number" class="form-control" id="valeur" name="valeur" required>
                            </div>
                            <button type="submit" class="btn btn-info">Rechercher</button>
                        </form>
                        <?php if (isset($resultat)) : ?>
                            <h3 class="mt-4">Résultat de la recherche :</h3>
                            <?php if ($resultat) : ?>
                                <p><strong>ID Emprunt :</strong> <?= htmlspecialchars($resultat->getIdEmprunt(), ENT_QUOTES, 'UTF-8') ?></p>
                                <p><strong>ID Livre :</strong> <?= htmlspecialchars($resultat->getIdLivre(), ENT_QUOTES, 'UTF-8') ?></p>
                                <p><strong>ID Membre :</strong> <?= htmlspecialchars($resultat->getIdMembre(), ENT_QUOTES, 'UTF-8') ?></p>
                                <p><strong>Date d'Emprunt :</strong> <?= htmlspecialchars($resultat->getDateEmprunt(), ENT_QUOTES, 'UTF-8') ?></p>
                                <p><strong>Date de Retour :</strong> <?= htmlspecialchars($resultat->getDateRetour(), ENT_QUOTES, 'UTF-8') ?></p>
                            <?php else : ?>
                                <p>Aucun emprunt trouvé pour ce critère.</p>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Liste de Tous les Emprunts</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID Emprunt</th>
                                    <th>ID Livre</th>
                                    <th>Nom Membre</th>
                                    <th>Date d'Emprunt</th>
                                    <th>Date de Retour</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tousLesEmprunts as $emprunt) : 
                                    $membre = $bibliotheque->rechercherMembreParId($emprunt->getIdMembre());
                                    ?>
                                    <tr>
                                        <td><?= htmlspecialchars($emprunt->getIdEmprunt(), ENT_QUOTES, 'UTF-8') ?></td>
                                        <td><?= htmlspecialchars($emprunt->getIdLivre(), ENT_QUOTES, 'UTF-8') ?></td>
                                        <td><?= htmlspecialchars($membre->getNom(), ENT_QUOTES, 'UTF-8') ?></td>
                                        <td><?= htmlspecialchars($emprunt->getDateEmprunt(), ENT_QUOTES, 'UTF-8') ?></td>
                                        <td><?= htmlspecialchars($emprunt->getDateRetour(), ENT_QUOTES, 'UTF-8') ?></td>
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
