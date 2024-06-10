<?php
/**
 * Created by PhpStorm.
 * User: sstienface
 * Date: 04/12/2018
 * Time: 11:25
 */

// Premiere ligne
echo 10 * 5;

echo "<br><br>";

//Deuxieme ligne
echo 10 / 2;

echo "<br><br>";

//Troisieme ligne
$a = 5;
$b = 5;
if($a === $b)
{
    echo "<br><br>a est identique à b";
}

//Quatrieme ligne
if($a !== $b)
{
    echo"<br><br>a n'est pas identique à b";
}

echo "<br><br>";

//Cinquieme ligne
$arr1 = ["poire", "pomme"];
$arr2 = ["pomme", "poire"];
if($arr1 == $arr2)
{
    echo "<br><br>les tableaux ont le même contenu";
}
