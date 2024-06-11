<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercices PHP</title>
</head>
<body>
    <h1>Exercices PHP</h1>

    <?php
    // Exercice 1
    $mois = [
        "janvier",
        "février",
        "mars",
        "avril",
        "mai",
        "juin",
        "juillet",
        "août",
        "septembre",
        "octobre",
        "novembre",
        "décembre"
    ];

    echo "<h2>Exercice 1: Tableau des mois</h2>";
    echo "<pre>";
    print_r($mois);
    echo "</pre>";

    // Exercice 2
    echo "<h2>Exercice 2: Valeur de l'index 5</h2>";
    echo "<p>Le mois à l'index 5 est : " . $mois[5] . "</p>";

    // Exercice 3
    echo "<h2>Exercice 3: Correction du mois d'août</h2>";
    $mois[7] = "août"; // Corrige déjà avec l'accent manquant
    echo "<p>Le mois corrigé est : " . $mois[7] . "</p>";

    // Exercice 4
    $hautsDeFrance = [
        59 => "Nord",
        62 => "Pas-de-Calais",
        80 => "Somme",
        60 => "Oise",
        02 => "Aisne"
    ];

    echo "<h2>Exercice 4: Tableau associatif des Hauts de France</h2>";
    echo "<pre>";
    print_r($hautsDeFrance);
    echo "</pre>";

    // Exercice 5
    echo "<h2>Exercice 5: Valeur de l'index 59</h2>";
    echo "<p>Le département 59 est : " . $hautsDeFrance[59] . "</p>";

    // Exercice 6
    echo "<h2>Exercice 6: Ajouter le département de Reims</h2>";
    $hautsDeFrance[51] = "Marne";
    echo "<pre>";
    print_r($hautsDeFrance);
    echo "</pre>";

    // Exercice 7
    echo "<h2>Exercice 7: Afficher tous les mois</h2>";
    echo "<ul>";
    foreach ($mois as $moisIndividuel) {
        echo "<li>" . $moisIndividuel . "</li>";
    }
    echo "</ul>";

    // Exercice 8
    echo "<h2>Exercice 8: Afficher tous les départements des Hauts de France</h2>";
    echo "<ul>";
    foreach ($hautsDeFrance as $departement) {
        echo "<li>" . $departement . "</li>";
    }
    echo "</ul>";

    // Exercice 9
    echo "<h2>Exercice 9: Afficher tous les départements avec leurs numéros</h2>";
    echo "<ul>";
    foreach ($hautsDeFrance as $num_departement => $nom_departement) {
        echo "<li>Le département " . $nom_departement . " a le numéro " . $num_departement . "</li>";
    }
    echo "</ul>";
    ?>
</body>
</html>
