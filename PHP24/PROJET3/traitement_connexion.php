<?php
session_start();
require 'db.php';

$identifiant = $_POST['identifiant'];
$mot_de_passe = $_POST['mot_de_passe'];

$sql = "SELECT * FROM utilisateurs WHERE nom_utilisateur = ? OR email = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$identifiant, $identifiant]);
$user = $stmt->fetch();

if ($user && password_verify($mot_de_passe, $user['mot_de_passe'])) {
    $_SESSION['utilisateur_id'] = $user['id'];
    header('Location: tableau_de_bord.php');
    exit;
} else {
    echo "Identifiants incorrects.";
}
?>
