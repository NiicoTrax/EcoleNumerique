<?php
/**
 * Created by PhpStorm.
 * User: sstienface
 * Date: 01/02/2019
 * Time: 09:47
 */
?>

<h1>Liste des Utilisateyrs</h1>
<ul>
<?php foreach($UsersList as $user){ ?>
    <li>
        <?php echo $user; ?>
    </li>
<?php } ?>
</ul>