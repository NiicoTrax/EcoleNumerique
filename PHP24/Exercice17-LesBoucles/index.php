<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercices PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>Exercice 1</h1>
        <div class="exercise">
            <?php
            $variable1 = 0;
            while ($variable1 < 10) {
                echo "<p>" . $variable1 . "</p>";
                $variable1++;
            }
            ?>
        </div>

        <h1>Exercice 2</h1>
        <div class="exercise">
            <?php
            $variable2_1 = 0;
            $variable2_2 = rand(1, 100);
            while ($variable2_1 <= 20) {
                $result = $variable2_1 * $variable2_2;
                echo "<p>Résultat: " . $result . "</p>";
                $variable2_1++;
            }
            ?>
        </div>

        <h1>Exercice 3</h1>
        <div class="exercise">
            <?php
            $variable3_1 = 100;
            $variable3_2 = rand(1, 100);
            while ($variable3_1 > 10) {
                $result = $variable3_1 * $variable3_2;
                echo "<p>Résultat: " . $result . "</p>";
                $variable3_1--;
            }
            ?>
        </div>

        <h1>Exercice 4</h1>
        <div class="exercise">
            <?php
            $variable4 = 1;
            while ($variable4 < 10) {
                echo "<p>" . $variable4 . "</p>";
                $variable4 += $variable4 / 2;
            }
            ?>
        </div>

        <h1>Exercice 5</h1>
        <div class="exercise">
            <h2>Partie 1</h2>
            <?php
            for ($i = 1; $i <= 15; $i++) {
                echo "<p>On y arrive presque.</p>";
            }
            ?>

            <h2>Partie 2</h2>
            <?php
            for ($i = 20; $i >= 0; $i--) {
                echo "<p>C'est presque bon.</p>";
            }
            ?>

            <h2>Partie 3</h2>
            <?php
            for ($i = 1; $i <= 100; $i += 15) {
                echo "<p>On tient le bon bout.</p>";
            }
            ?>

            <h2>Partie 4</h2>
            <?php
            for ($i = 200; $i >= 0; $i -= 12) {
                echo "<p>Enfin !!!!</p>";
            }
            ?>
        </div>
    </div>

</body>
</html>
