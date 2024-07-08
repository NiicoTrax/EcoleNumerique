<?php


require('interfaces/user.interface.php');

class user implements userInterface
{

    private $request;

    public function __construct()
    {
        $this->getRequest($_REQUEST);
    }




}