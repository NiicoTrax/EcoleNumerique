<?php


namespace index;

require('classes/classe1.php');
require('classes/classe2.php');

require('classes/classe3.php');//LIER FICHIER DECLARANT LA CLASSE MAIS UTILISER UN PHP FILE PLUTOT QU UN PHP CLASS
require('classes/classe4.php');

use maClasse1\maClasse as maClasse1; //NAMESPACE\CLASS AS NAMESPACE
use maClasse2\maClasse as maClasse2;

use Test1\monTest as Test1;
use Test2\monTest as Test2;

maClasse1::printSomething();//NAMESPACE::MAFONCTION
echo"<br><br>";

maClasse2::printSomething();
echo"<br><br>";

Test1::affichage();
echo"<br><br>";
Test2::affichage();







