<?php
require_once __DIR__ . '/../config/database.php';

try {
    $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

require_once __DIR__ . '/../classes/Livre.php';
require_once __DIR__ . '/../classes/Membre.php';
require_once __DIR__ . '/../classes/Emprunt.php';
require_once __DIR__ . '/../classes/Bibliotheque.php';

$bibliotheque = new Bibliotheque();

$stmt = $pdo->query('SELECT * FROM livres');
while ($row = $stmt->fetch()) {
    $livre = new Livre($row['isbn'], $row['titre'], $row['auteur'], $row['annee_publication'], $row['genre']);
    $bibliotheque->ajouterLivre($livre);
}

$stmt = $pdo->query('SELECT * FROM membres');
while ($row = $stmt->fetch()) {
    $membre = new Membre($row['id'], $row['nom'], $row['email'], $row['date_adhesion']);
    $bibliotheque->ajouterMembre($membre);
}

$stmt = $pdo->query('SELECT * FROM emprunts');
while ($row = $stmt->fetch()) {
    $emprunt = new Emprunt($row['id'], $row['id_livre'], $row['id_membre'], $row['date_emprunt'], $row['date_retour']);
    $bibliotheque->ajouterEmprunt($emprunt);
}
?>
