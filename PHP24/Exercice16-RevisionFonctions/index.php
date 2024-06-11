<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 16 - Révision Fonctions</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Exercice 16 - Révision Fonctions</h1>
        
        <?php
        // Exercice 1
        function returnTrue() {
            return true;
        }
        echo "<p>Exercice 1: " . (returnTrue() ? 'true' : 'false') . "</p>";

        // Exercice 2
        function returnString($string) {
            return $string;
        }
        echo "<p>Exercice 2: " . returnString("Hello, World!") . "</p>";

        // Exercice 3
        function concatenateStrings($string1, $string2) {
            return $string1 . $string2;
        }
        echo "<p>Exercice 3: " . concatenateStrings("Coucou, ", "Comment ca va ?") . "</p>";

        // Exercice 4
        function compareNumbers($num1, $num2) {
            if ($num1 > $num2) {
                return "Le premier nombre est plus grand";
            } elseif ($num1 < $num2) {
                return "Le premier nombre est plus petit";
            } else {
                return "Les deux nombres sont identiques";
            }
        }
        echo "<p>Exercice 4: " . compareNumbers(5, 3) . "</p>";
        echo "<p>Exercice 4: " . compareNumbers(3, 5) . "</p>";
        echo "<p>Exercice 4: " . compareNumbers(3, 3) . "</p>";

        // Exercice 5
        function concatenateNumberAndString($number, $string) {
            return $number . $string;
        }
        echo "<p>Exercice 5: " . concatenateNumberAndString(5, " apples") . "</p>";

        // Exercice 6
        function greetPerson($nom, $prenom, $age) {
            return "Bonjour " . $nom . " " . $prenom . ", tu as " . $age . " ans.";
        }
        echo "<p>Exercice 6: " . greetPerson("Doe", "John", 25) . "</p>";

        // Exercice 7
        function personDescription($age, $genre) {
            if ($genre === "Homme") {
                if ($age >= 18) {
                    return "Vous êtes un homme et vous êtes majeur";
                } else {
                    return "Vous êtes un homme et vous êtes mineur";
                }
            } elseif ($genre === "Femme") {
                if ($age >= 18) {
                    return "Vous êtes une femme et vous êtes majeur";
                } else {
                    return "Vous êtes une femme et vous êtes mineur";
                }
            }
        }
        echo "<p>Exercice 7: " . personDescription(20, "Homme") . "</p>";
        echo "<p>Exercice 7: " . personDescription(16, "Homme") . "</p>";
        echo "<p>Exercice 7: " . personDescription(22, "Femme") . "</p>";
        echo "<p>Exercice 7: " . personDescription(17, "Femme") . "</p>";

        // Exercice 8
        function sumNumbers($num1 = 0, $num2 = 0, $num3 = 0) {
            return $num1 + $num2 + $num3;
        }
        echo "<p>Exercice 8: " . sumNumbers(1, 2, 3) . "</p>";
        echo "<p>Exercice 8: " . sumNumbers() . "</p>";
        ?>

    </div>
</body>
</html>
