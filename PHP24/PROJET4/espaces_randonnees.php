<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: connexion.php");
    exit;
}

require 'assets/includes/db.php';


$stmt = $pdo->prepare("SELECT DISTINCT difficulty FROM hiking");
$stmt->execute();
$difficulty_levels = $stmt->fetchAll(PDO::FETCH_ASSOC);

$randos = $pdo->query("SELECT * FROM hiking")->fetchAll(PDO::FETCH_ASSOC);
?>

<?php $pageTitle = "Espace Randonnées"; ?>
<?php include 'assets/includes/headerclient.php'; ?>

<div class="user-info">
    <h1>Bonjour, <?php echo $_SESSION['user']; ?></h1>
</div>
<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Difficulté</th>
            <th>Distance (km)</th>
            <th>Durée</th>
            <th>Dénivelé (m)</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($randos as $rando): ?>
        <tr>
            <td><?php echo $rando['name']; ?></td>
            <td><?php echo $rando['difficulty']; ?></td>
            <td><?php echo $rando['distance']; ?></td>
            <td><?php echo $rando['duration']; ?></td>
            <td><?php echo $rando['height_difference']; ?></td>
            <td><a href="update.php?id=<?php echo $rando['id']; ?>">Modifier</a></td>
            <td><a href="delete.php?id=<?php echo $rando['id']; ?>">Supprimer</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<form action="create.php" method="post">
    <h2>Ajouter un nouvelle utilisateur à la randonnée</h2>
    <label for="name">Nom:</label>
    <input type="text" name="name" required>
    <label for="difficulty">Difficulté:</label>
    <select name="difficulty" required>
        <?php foreach ($difficulty_levels as $level): ?>
            <option value="<?php echo $level['difficulty']; ?>"><?php echo ucfirst($level['difficulty']); ?></option>
        <?php endforeach; ?>
    </select>
    <label for="distance">Distance (km):</label>
    <input type="text" name="distance" required>
    <label for="duration">Durée (hh:mm:ss):</label>
    <input type="text" name="duration" required>
    <label for="height_difference">Dénivelé (m):</label>
    <input type="text" name="height_difference" required>
    <input type="submit" value="Ajouter">
</form>

<?php include 'assets/includes/footer.php'; ?>
