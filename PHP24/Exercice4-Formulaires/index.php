<?php
// Afficher la variable fname envoyée via la méthode POST
if (isset($_POST['fname'])) {
    echo "Bonjour, " . htmlspecialchars($_POST['fname']) . "!";
} else {
    echo "Aucune donnée reçue.";
}
?>
