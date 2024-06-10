<?php

// Première ligne
$i = 1;
while($i < 6) { 
    echo $i;
    $i++;
}

echo"<br><br>";

// Deuxième ligne
$i = 1;
do {
    echo $i;
    $i++;
} while($i < 6); 

echo"<br><br>";

// Troisième ligne
for($i = 0; $i < 10; $i++) { 
    echo $i;
}

echo"<br><br>";

// Quatrième ligne
$colors = array("rouge", "vert", "bleu", "jaune");
foreach($colors as $x) { 
    echo $x;
}

?>

