<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: connexion.php");
    exit;
}

include 'db.php';

// Récupérer les niveaux de difficulté distincts depuis la table hiking
$stmt = $pdo->prepare("SELECT DISTINCT difficulty FROM hiking");
$stmt->execute();
$difficulty_levels = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $difficulty = $_POST['difficulty'];
    $distance = $_POST['distance'];
    $duration = $_POST['duration'];
    $height_difference = $_POST['height_difference'];

    $stmt = $pdo->prepare("UPDATE hiking SET name = :name, difficulty = :difficulty, distance = :distance, duration = :duration, height_difference = :height_difference WHERE id = :id");
    $stmt->execute(['id' => $id, 'name' => $name, 'difficulty' => $difficulty, 'distance' => $distance, 'duration' => $duration, 'height_difference' => $height_difference]);
    header("Location: espaces_randonnees.php");
} elseif (isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM hiking WHERE id = :id");
    $stmt->execute(['id' => $_GET['id']]);
    $rando = $stmt->fetch();
}
?>

<?php $pageTitle = "Modifier la Randonnée"; ?>
<?php include 'header.php'; ?>

<form action="update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $rando['id']; ?>">
    <label for="name">Nom:</label>
    <input type="text" name="name" value="<?php echo $rando['name']; ?>" required>
    <label for="difficulty">Difficulté:</label>
    <select name="difficulty" required>
        <?php foreach ($difficulty_levels as $level): ?>
            <option value="<?php echo $level['difficulty']; ?>" <?php if ($rando['difficulty'] == $level['difficulty']) echo 'selected'; ?>><?php echo ucfirst($level['difficulty']); ?></option>
        <?php endforeach; ?>
    </select>
    <label for="distance">Distance (km):</label>
    <input type="text" name="distance" value="<?php echo $rando['distance']; ?>" required>
    <label for="duration">Durée (hh:mm:ss):</label>
    <input type="text" name="duration" value="<?php echo $rando['duration']; ?>" required>
    <label for="height_difference">Dénivelé (m):</label>
    <input type="text" name="height_difference" value="<?php echo $rando['height_difference']; ?>" required>
    <input type="submit" value="Mettre à jour">
</form>

<?php include 'footer.php'; ?>
