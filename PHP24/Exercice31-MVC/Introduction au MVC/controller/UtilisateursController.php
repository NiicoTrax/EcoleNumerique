<?php
/**
 * Created by PhpStorm.
 * User: sstienface
 * Date: 01/02/2019
 * Time: 09:34
 */

class UtilisateursController {

    private $model;

    /**
     * @set model from model/Utilisateurs.php
     */
    public function __construct()
    {

        $this->model = new Utilisateurs();

    }

    /**
     * @display users using view/UsersList.php
     */
    public function UsersList()
    {
        $UsersList = $this->model->getAll();
        include "view/UsersList.php";
    }

    /**
     *
     */
    public function UserCreate()
    {
        // Votre code ici
    }

    /**
     *
     */
    public function UserDelete()
    {
        // Votre code ici
    }




} 