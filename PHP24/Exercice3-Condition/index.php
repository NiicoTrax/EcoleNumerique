<?php

// Premiere ligne
$a = 50;
$b = 10;
if ($a > $b) {
    echo "Hello World!";
}

// Deuxieme ligne
if ($a != $b) {
    echo "<br><br>Hello World2";
}

// Troisieme ligne
if ($a == $b) {
    echo "<br><br>Oui";
} else {
    echo "<br><br>Non";
}

// Quatrieme ligne
echo "<br><br>";
if ($a == $b) {
    echo "1";
} elseif ($a > $b) {
    echo "2";
} else {
    echo "3";
}

// Cinquieme ligne
echo "<br><br>";
$color = "red"; // Assurez-vous que la variable $color est définie
if ($color == "red") {
    echo "Hello";
} elseif ($color == "green") {
    echo "Welcome";
} else {
    echo "La couleur n'est ni rouge ni verte.";
}

?>
