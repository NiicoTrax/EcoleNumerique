<?php 

// 1. Affichage et incrémentation boucle 0-10

echo "<h2> EXERCICE 1 : </h2>";

$compteur1 = 0;

while ($compteur1 < 10) {
    echo $compteur1 . "\n";
    $compteur1++;
}



// 2. Multiplication, affichage et incrémentation

echo "<h2> EXERCICE 2 : </h2>";

$compteur2 = 0;
$nombre2 = rand(1, 100);

while ($compteur2 <= 20) {
    $resultat2 = $compteur2 * $nombre2;
    echo $resultat2 . "\n";
    $compteur2++;
}

// 3. Multiplication, affichage et décrémentation

echo "<h2> EXERCICE 3 : </h2>";

$compteur3 = 100;
$nombre3 = rand(1, 100);

while ($compteur3 > 10) {
    $resultat3 = $compteur3 * $nombre3;
    echo $resultat3 . "\n";
    $compteur3--;
}

// 4. Parcours de variables

echo "<h2> EXERCICE 4 : </h2>";

$variable = 1;

while ($variable < 10) {
    echo $variable . '<br>'; // affiche la valeur de la variable
    $variable += $variable / 2; // incrémente la variable de la moitié de sa valeur
}

echo 'La variable atteint maintenant la valeur 10';

// 5. on y est presque

echo "<h2> EXERCICE 5 : </h2>";

for ($i = 1; $i <= 15; $i++) {
  echo '<br> On y arrive presque.';
}

echo "<h2> EXERCICE 6 : </h2>";

// 6. C'est presque bon 
for ($i = 20; $i >= 0; $i--) {
  echo '<br> C\'est presque bon.';
}

// 7. On tient le bon bout.

echo "<h2> EXERCICE 7 : </h2>";

for ($i = 1; $i <= 100; $i += 15) {
  echo 'On tient le bon bout. <br>';
}

// 8. ENFIN .

echo "<h2> EXERCICE 8 : </h2>";

for ($i = 200; $i >= 0; $i -= 12) {
  echo 'Enfin !!!! <br>';
}

?>