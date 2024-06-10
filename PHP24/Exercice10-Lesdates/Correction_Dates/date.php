<?php

echo "<h2> EXERCICE 1 : </h2>";

    date_default_timezone_set('Europe/Paris');
    echo date('l');

echo "<h2> EXERCICE 2 : </h2>";

    $date_timestamp = strtotime('2018-12-10');
    echo date('Y.m.d', $date_timestamp);

echo "<h2> EXERCICE 3 : </h2>";

    $time_timestamp = strtotime('11:35:07');
    echo date('H:i:s', $time_timestamp);


?>






