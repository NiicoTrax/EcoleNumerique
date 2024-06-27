<?php
require 'db.php';

$nom_utilisateur = $_POST['nom_utilisateur'];
$email = $_POST['email'];
$mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);

$sql = "SELECT * FROM utilisateurs WHERE nom_utilisateur = ? OR email = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$nom_utilisateur, $email]);

if ($stmt->rowCount() > 0) {
    echo "Le nom d'utilisateur ou l'adresse e-mail est déjà utilisé.";
} else {
    $sql = "INSERT INTO utilisateurs (nom_utilisateur, email, mot_de_passe) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$nom_utilisateur, $email, $mot_de_passe])) {
        echo "Inscription réussie. <a href='connexion.php'>Se connecter</a>";
    } else {
        echo "Une erreur est survenue lors de l'inscription.";
    }
}
?>
