<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Afficher la Date et l'Heure</title>
</head>
<body>
    <?php
    // Afficher le jour de la semaine sous forme textuelle
    date_default_timezone_set('Europe/Paris');
    echo "Le jour de la semaine actuel est : " . date("l") . "<br>";

    // Afficher la date suivante : "2018.12.10"
    $specificDate = "2018-12-10";
    echo "La date spécifique est : " . date("Y.m.d", strtotime($specificDate)) . "<br>";

    // Afficher l'heure suivante : "11:35:07"
    $specificTime = "11:35:07";
    echo "L'heure spécifique est : " . date("H:i:s", strtotime($specificTime)) . "<br>";
    ?>
</body>
</html>
