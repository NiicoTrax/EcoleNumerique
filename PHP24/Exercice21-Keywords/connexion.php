<?php
$host = "localhost"; // nom de l'hÃ´te MySQL
$dbname = "keyword"; // nom de la base de donnÃ©es MySQL
$username = "root"; // nom d'utilisateur MySQL
$password = ""; // mot de passe MySQL

// Connexion Ã  la base de donnÃ©es avec PDO
try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  die("Erreur de connexion Ã  la base de donnÃ©es: " . $e->getMessage());
}
?>
