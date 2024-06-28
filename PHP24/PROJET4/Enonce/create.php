<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: connexion.php");
    exit;
}

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $difficulty = $_POST['difficulty'];
    $distance = $_POST['distance'];
    $duration = $_POST['duration'];
    $height_difference = $_POST['height_difference'];

    $stmt = $pdo->prepare("INSERT INTO hiking (name, difficulty, distance, duration, height_difference) VALUES (:name, :difficulty, :distance, :duration, :height_difference)");
    $stmt->execute(['name' => $name, 'difficulty' => $difficulty, 'distance' => $distance, 'duration' => $duration, 'height_difference' => $height_difference]);
    header("Location: espaces_randonnees.php");
}
?>

<?php $pageTitle = "Ajouter une Nouvelle Randonnée"; ?>
<?php include 'header.php'; ?>

<form action="create.php" method="post">
    <label for="name">Nom:</label>
    <input type="text" name="name" required>
    <label for="difficulty">Difficulté:</label>
    <select name="difficulty" required>
        <?php foreach ($difficulty_levels as $level): ?>
            <option value="<?php echo $level['level']; ?>"><?php echo ucfirst($level['level']); ?></option>
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

<?php include 'footer.php'; ?>
