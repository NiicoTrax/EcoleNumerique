<?php

    // 1. Création du tableau mois et initialisation des paramètres.

    $mois = array();
    $mois = ["janvier", "février", "mars", "avril", "mai", "juin", "juillet", "aout", "septembre", "octobre", "novembre", "décembre"];
      

    // 2. Afficher l'index 5 du tableau.

    echo $mois[5] ."<br>"; // affiche "juin"

    // 3. Ajouter l'accent manquant au mois d'aout (août);

    $mois[7] = 'août';
    echo "<br>". $mois[7] ."<br>";

    // 4. Création du tableau associatif avec comme index le numéro des départements et en valeur le nom.

    $departements = array(
        59 => "Nord",
        62 => "Pas-de-Calais",
        80 => "Somme",
        02 => "Aisne",
        60 => "Oise"
    );
    
    // 5. Afficher le département 59.

    echo "<br>". $departements[59] . "<br>";

    // 6. ajout de la ligne correspondant au département de la ville de Reims.

    $departements[51] = "Marne";
    echo "<br>".$departements[51] ."<br><br>";

    // 7. Affichage du 1er tableau (mois).

    foreach ($mois as $m) {
        echo $m . "\n";
    }    

    // 8. Affichage du 2e tableau (département).

    echo "<br><br>";

    foreach ($departements as $dp) {
        echo $dp . "\n";
    }

    echo "<br><br>";

    // 9. Afficher département plus numéro dans un texte
    
    foreach ($departements as $num_departement => $nom_departement) {
        echo "Le département ".$nom_departement . " a le numéro ".$num_departement."<br>";
    }
    

?>
