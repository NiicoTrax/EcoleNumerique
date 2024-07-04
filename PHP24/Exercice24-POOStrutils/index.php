<?php


require "classes/StrUtils.php";

$utils = new StrUtils("Salut à tous");

Echo "Bold : ".$utils->bold();

Echo "<br><br>";

Echo "Italic : ".$utils->italic();

Echo "<br><br>";

Echo "Underline : ".$utils->underline();

Echo "<br><br>";

Echo "Capitalize : ".$utils->capitalize();

Echo "<br><br>";

Echo "Bold, Italic, Underline, Capitalize : ".$utils->uglify();