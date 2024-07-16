<?php
/**
 * Created by PhpStorm.
 * User: sstienface
 * Date: 11/12/2018
 * Time: 14:35
 */
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



// On récupere le parametre utilisateur appelé controller
$controller = $_REQUEST['controller'];
$action = $_REQUEST['action'];



switch($controller)
{
    case"utilisateurs":



        require "model/Utilisateurs.php";
        require "controller/UtilisateursController.php";



        $ctrl = new UtilisateursController();



        switch($action)
        {
            case"UsersList":
                $ctrl->UsersList();
                break;

            case"UserDelete":
                // Implémentation à faire ici
                break;

            case"UserCreate":
                // Implémentation à faire ici
                break;

            default:
                //Par défaut , je souhaite lister mes utilisteurs
                $ctrl->UsersList();
                break;
        }

        break;
}












