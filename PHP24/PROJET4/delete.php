<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: connexion.php");
    exit;
}

require 'assets/includes/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM hiking WHERE id = :id");
    $stmt->execute(['id' => $id]);
    header("Location: espaces_randonnees.php");
}
?>