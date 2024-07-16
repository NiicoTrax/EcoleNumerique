<?php

class UtilisateursController {

    private $model;

    public function __construct() {
        $this->model = new Utilisateurs();
    }

    public function UsersList() {
        $UsersList = $this->model->getAll();
        include "view/UsersList.php";
    }

    public function UserCreate() {
        // Votre code ici pour ajouter un utilisateur
        $this->model->create();
        $this->UsersList();
    }

    public function UserDelete() {
        // Votre code ici pour supprimer un utilisateur
        if (isset($_GET['index'])) {
            $this->model->delete($_GET['index']);
        }
        $this->UsersList();
    }
}
?>
