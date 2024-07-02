<?php
session_start();
require 'assets/includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = :email AND password = :password");
    $stmt->execute(['email' => $email, 'password' => $password]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['user'] = $user['name'];
        header("Location: espaces_randonnees.php");
    } else {
        header('Location: connexion.php?error=1');
        exit;
    }
}
?>