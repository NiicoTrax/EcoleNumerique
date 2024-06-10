<?php

// Première ligne
$fruits = array("Apple", "Banana", "Orange");
echo count($fruits); 
echo "<br>";
echo $fruits[1]; 

echo "<br><br>";

// Deuxième ligne
$age = array("Peter" => "35", "Ben" => "37", "Joe" => "43"); 
echo "Ben is " . $age["Ben"] . " years old.<br><br>";

foreach($age as $x => $y) { 
    echo "Key=" . $x . ", Value=" . $y . "<br>";
}

echo "<br><br>";

// Troisième ligne
$colors = array("red", "green", "blue", "yellow");
sort($colors); 
print_r($colors);
echo "<br>";
rsort($colors); 
print_r($colors);

echo "<br><br>";

// Quatrième ligne
$numbers = array(4, 6, 2, 22, 11);
sort($numbers); 
print_r($numbers);

?>
