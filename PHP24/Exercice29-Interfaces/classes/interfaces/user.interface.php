<?php


interface userInterface
{
    // Une interface peut définir des constantes, ce sont les seules valeurs pouvant être définie dans une interface

    const MAX_INSTANCES = 5;

    public function getRequest($request);

    public function parseRequest();


}