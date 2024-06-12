<?php
// Exercice 1
if (isset($_GET['nom']) && isset($_GET['prenom']) && !isset($_GET['exercice'])) {
    echo 'Exercice 1:<br>';
    echo 'Nom : ' . htmlspecialchars($_GET['nom']) . '<br>';
    echo 'Prénom : ' . htmlspecialchars($_GET['prenom']) . '<br><br>';
}

// Exercice 2
if ((isset($_GET['nom']) || isset($_GET['prenom'])) && isset($_GET['exercice']) && $_GET['exercice'] == 2) {
    echo 'Exercice 2:<br>';
    if (isset($_GET['nom'])) {
        echo 'Nom : ' . htmlspecialchars($_GET['nom']) . '<br>';
    }
    if (isset($_GET['prenom'])) {
        echo 'Prénom : ' . htmlspecialchars($_GET['prenom']) . '<br>';
    }
} elseif (isset($_GET['exercice']) && $_GET['exercice'] == 2) {
    echo 'Erreur : nom et/ou prénom manquant(s)<br><br>';
}

// Exercice 3
if (isset($_GET['dateDebut']) && isset($_GET['dateFin']) && isset($_GET['exercice']) && $_GET['exercice'] == 3) {
    echo 'Exercice 3:<br>';
    echo 'Date de début : ' . htmlspecialchars($_GET['dateDebut']) . '<br>';
    echo 'Date de fin : ' . htmlspecialchars($_GET['dateFin']) . '<br>';
    
    if (empty($_GET['dateDebut']) && empty($_GET['dateFin'])) {
        echo 'Erreur : Tous les paramètres sont vides<br><br>';
    }
}

// Exercice 4
if (isset($_GET['langage']) && isset($_GET['serveur']) && isset($_GET['exercice']) && $_GET['exercice'] == 4) {
    echo 'Exercice 4:<br>';
    echo 'Langage : ' . htmlspecialchars($_GET['langage']) . '<br>';
    echo 'Serveur : ' . htmlspecialchars($_GET['serveur']) . '<br>';
    
    if (empty($_GET['langage']) && empty($_GET['serveur'])) {
        echo 'Erreur : Tous les paramètres sont vides<br><br>';
    }
}

// Exercice 5
if (isset($_GET['semaine']) && isset($_GET['exercice']) && $_GET['exercice'] == 5) {
    echo 'Exercice 5:<br>';
    echo 'Semaine : ' . htmlspecialchars($_GET['semaine']) . '<br><br>';
} elseif (isset($_GET['exercice']) && $_GET['exercice'] == 5) {
    echo 'Erreur : Paramètre semaine manquant<br><br>';
}

// Exercice 6
if (isset($_GET['batiment']) && isset($_GET['salle']) && isset($_GET['exercice']) && $_GET['exercice'] == 6) {
    echo 'Exercice 6:<br>';
    echo 'Bâtiment : ' . htmlspecialchars($_GET['batiment']) . '<br>';
    echo 'Salle : ' . htmlspecialchars($_GET['salle']) . '<br><br>';
} elseif (isset($_GET['exercice']) && $_GET['exercice'] == 6) {
    echo 'Erreur : Paramètres manquants<br><br>';
}
?>
