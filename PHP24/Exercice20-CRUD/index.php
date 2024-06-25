<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud2";

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 1. Ajouter 5 entrées
$sql = "INSERT INTO users (nom, prenom, age) VALUES 
    ('Dupont', 'Jean', 30), 
    ('Martin', 'Lucie', 25), 
    ('Bernard', 'Sophie', 22), 
    ('Durand', 'Pierre', 28), 
    ('Moreau', 'Marie', 35)";

if ($conn->query($sql) === TRUE) {
    echo "5 nouvelles entrées ajoutées avec succès<br>";
} else {
    echo "Erreur: " . $sql . "<br>" . $conn->error;
}

// 2. Mettre à jour certaines entrées
$sql1 = "UPDATE users SET nom='Lefevre' WHERE id=1";
$sql2 = "UPDATE users SET age=26 WHERE id=2";
$sql3 = "UPDATE users SET prenom='Elise' WHERE id=3";

if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE) {
    echo "Entrées mises à jour avec succès<br>";
} else {
    echo "Erreur lors de la mise à jour: " . $conn->error;
}

// 3. Supprimer l'entrée ayant pour id=5
$sql = "DELETE FROM users WHERE id=5";

if ($conn->query($sql) === TRUE) {
    echo "Entrée supprimée avec succès<br>";
} else {
    echo "Erreur: " . $sql . "<br>" . $conn->error;
}

// 4. Ajouter une entrée supplémentaire
$sql = "INSERT INTO users (nom, prenom, age) VALUES ('Petit', 'Anais', 29)";

if ($conn->query($sql) === TRUE) {
    echo "Nouvelle entrée ajoutée avec succès<br>";
} else {
    echo "Erreur: " . $sql . "<br>" . $conn->error;
}

// 5. Afficher les entrées de la table
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<pre>";
    while($row = $result->fetch_assoc()) {
        print_r($row);
    }
    echo "</pre>";
} else {
    echo "0 résultats";
}

// BONUS: Afficher uniquement les prénoms dans un paragraphe HTML
echo "<h3>Prénoms des utilisateurs:</h3>";
echo "<ul>";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<li>" . htmlspecialchars($row["prenom"]) . "</li>";
    }
}
echo "</ul>";

$conn->close();
?>
