<?php
include "connexion.php";

// TEST CONDITION


// ------------------------------------------------------------------------------------------
                                    /* DISTINCT */
// ------------------------------------------------------------------------------------------

$query = "SELECT DISTINCT pays from `users` where 1";
$var1 = $pdo->prepare($query);
$var1->execute();

echo "<h2 style='border:solid red 2px; text-align:center;'> DISTINCT </h2>";

while ($row = $var1->fetch(PDO::FETCH_ASSOC)) 
{
    $pays = $row['pays'];
    echo "Pays : " . $pays . "<br>";
}

// ------------------------------------------------------------------------------------------
                                    /* ORDER BY ASC */
// ------------------------------------------------------------------------------------------

$query = "SELECT * from `users` where 1 ORDER BY nom ASC";
$var1 = $pdo->prepare($query);
$var1->execute();

echo "<h2 style='border:solid red 2px; text-align:center;'> ORDER BY ASC </h2>";

while ($row = $var1->fetch(PDO::FETCH_ASSOC)) 
{
    $prenom = $row['prenom'];
    $nom = $row['nom'];
    $pays = $row['pays'];
    $argt = $row['argent'];

    echo "Prénom : " . $prenom . "<br>";
    echo "Nom : " . $nom  . "<br>";
    echo "Pays : " . $pays . "<br>";
    echo "Argent : " . $argt . "<br>";
    echo "<br>";
}

// ------------------------------------------------------------------------------------------
                                    /* ORDER BY DESC */
// ------------------------------------------------------------------------------------------

$query = "SELECT * from `users` where 1 ORDER BY nom DESC";
$var1 = $pdo->prepare($query);
$var1->execute();

echo "<h2 style='border:solid red 2px; text-align:center;'> ORDER BY DESC </h2>";

while ($row = $var1->fetch(PDO::FETCH_ASSOC)) 
{
    $prenom = $row['prenom'];
    $nom = $row['nom'];
    $pays = $row['pays'];
    $argt = $row['argent'];

    echo "Prénom : " . $prenom . "<br>";
    echo "Nom : " . $nom  . "<br>";
    echo "Pays : " . $pays . "<br>";
    echo "Argent : " . $argt . "<br>";
    echo "<br>";
}

// ------------------------------------------------------------------------------------------
                                    /* MIN  & MAX */
// ------------------------------------------------------------------------------------------

echo "<h2 style='border:solid red 2px; text-align:center;'> MIN & MAX </h2>";

$sql = "SELECT MIN(argent) FROM users WHERE 1";
$stmt = $pdo->query($sql);

if ($stmt->rowCount() > 0) 
{
    while($row = $stmt->fetch()) {
            echo "Le minimum de la colonne 'argent' dans la table 'users' est : " . $row["MIN(argent)"];
    }
    } else {
        echo "Aucun résultat trouvé.";
}

// *****************************

echo "<br>";
echo "<br>";

// *****************************


$sql = "SELECT MAX(argent) FROM users WHERE 1";
$stmt = $pdo->query($sql);

if ($stmt->rowCount() > 0) 
{
    while($row = $stmt->fetch()) {
            echo "Le maximum de la colonne 'argent' dans la table 'users' est : " . $row["MAX(argent)"];
    }
    } else {
        echo "Aucun résultat trouvé.";
}

// ------------------------------------------------------------------------------------------
                                    /* COUNT */
// ------------------------------------------------------------------------------------------

echo "<h2 style='border:solid red 2px; text-align:center;'> COUNT </h2>";

$query = $pdo->prepare("SELECT count(*) FROM users WHERE argent < :argent");

// Valeur à utiliser pour le paramètre :argent
$argent = 50000;

// Exécution de la requête en passant la valeur du paramètre
$query->execute(array(':argent' => $argent));

// Récupération du résultat
$result = $query->fetchColumn();

// Affichage du résultat
echo "Nombre d'utilisateurs dont la quantité d'argent est inférieure à 50000 : " . $result;



// ------------------------------------------------------------------------------------------
                                    /* AVG */
// ------------------------------------------------------------------------------------------

echo "<h2 style='border:solid red 2px; text-align:center;'> AVG </h2>";

  // Requête SQL
  $sql = "SELECT AVG(argent) FROM users WHERE 1";

  // Exécution de la requête
  $resultat = $pdo->query($sql);
  $moyenne = $resultat->fetchColumn();

  echo "La moyenne d'argent des utilisateurs est de : " . $moyenne;

// ------------------------------------------------------------------------------------------
                                    /* SUM */
// ------------------------------------------------------------------------------------------

echo "<h2 style='border:solid red 2px; text-align:center;'> SUM </h2>";

  // Requête SQL
  $sql = "SELECT SUM(argent) FROM users WHERE 1";

  // Exécution de la requête
  $resultat = $pdo->query($sql);
  $sum = $resultat->fetchColumn();

  echo "La somme total d'argents des utilisateurs est de : " . $sum;

// ------------------------------------------------------------------------------------------
                                    /* LIKE */
// ------------------------------------------------------------------------------------------

/*
    'j%' -> La requete va vous retourner tout les utilisateurs dont la colonne prenom commence par la lettre j ;
    '%s' -> La requete va vous retourner tout les utilisateurs dont la colonne prenom se termine par la lettre s ;
    '%a%' ->  La requete va vous retourner tout les utilisateurs dont la colonne prenom contient la lettre a ( quelque soit la position );

*/

echo "<h2 style='border:solid red 2px; text-align:center;'> LIKE </h2>";

  // Requête SQL
  $sql = "SELECT * FROM users WHERE prenom LIKE '%a%'";

  // Exécution de la requête
  $resultat = $pdo->query($sql);

  // Parcourir les résultats
  while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {
    echo "Prenom : " . $row['prenom'] . "<br/>";
    echo "Nom : " . $row['nom'] . "<br/>";
    echo "Pays : " . $row['pays'] . "<br/>";
    echo "Argent : " . $row['argent'] . "<br/>";
    echo "<br/>";
  }


?>