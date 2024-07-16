<?php

?>

<body>
<ul>
    <li>
        <a href="index.php?controller=utilisateurs&action=UsersList">Lister les utilisateurs</a>
    </li>
    <li>
        <a href="index.php?controller=utilisateurs&action=UserDelete">Supprimer un utilisateur puis les lister</a>
    </li>
    <li>
        <a href="index.php?controller=utilisateurs&action=UserCreate">Ajouter un utilisateur puis les lister</a>
    </li>
</ul>
</body>

<?php

// On récupère le paramètre utilisateur appelé controller
$controller = $_REQUEST['controller'];
$action = $_REQUEST['action'];

switch ($controller) {
    case "utilisateurs":
        require "model/Utilisateurs.php";
        require "controller/UtilisateursController.php";

        $ctrl = new UtilisateursController();

        switch ($action) {
            case "UsersList":
                $ctrl->UsersList();
                break;

            case "UserDelete":
                // Implémentation à faire ici
                $ctrl->UserDelete();
                break;

            case "UserCreate":
                // Implémentation à faire ici
                $ctrl->UserCreate();
                break;

            default:
                // Par défaut, je souhaite lister mes utilisateurs
                $ctrl->UsersList();
                break;
        }
        break;
}
?>
