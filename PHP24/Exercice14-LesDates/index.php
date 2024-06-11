<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Exercices PHP</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<header>
    <div class="container">
        <h1>Exercices PHP</h1>
    </div>
</header>

<div class="container">
    <div class="exercises">
        <h2>Exercice 1 : Afficher la date courante (jj/mm/aaaa)</h2>
        <p><?php echo date('d/m/Y'); ?></p>

        <h2>Exercice 2 : Afficher la date courante (jj-mm-aa)</h2>
        <p><?php echo date('d-m-y'); ?></p>

        <h2>Exercice 3 : Afficher la date courante avec le jour de la semaine et le mois en toutes lettres</h2>
        <p>
            <?php
            setlocale(LC_TIME, 'fr_FR.UTF-8');
            echo strftime('%A %e %B %Y');
            ?>
        </p>

        <h2>Exercice 4 : Afficher le timestamp du jour et le timestamp du mardi 2 août 2016 à 15h00</h2>
        <p>Timestamp du jour : <?php echo time(); ?></p>
        <p>Timestamp du mardi 2 août 2016 à 15h00 : <?php echo mktime(15, 0, 0, 8, 2, 2016); ?></p>

        <h2>Exercice 5 : Nombre de jours entre aujourd'hui et le 16 mai 2016</h2>
        <p>
            <?php
            $date1 = new DateTime();
            $date2 = new DateTime('2016-05-16');
            $interval = $date1->diff($date2);
            echo $interval->format('%a jours');
            ?>
        </p>

        <h2>Exercice 6 : Nombre de jours en février 2016</h2>
        <p><?php echo "Nombre de jours en février 2016 : " . cal_days_in_month(CAL_GREGORIAN, 2, 2016); ?></p>

        <h2>Exercice 7 : Date du jour + 20 jours</h2>
        <p><?php echo date('d/m/Y', strtotime('+20 days')); ?></p>

        <h2>Exercice 8 : Date du jour - 22 jours</h2>
        <p><?php echo date('d/m/Y', strtotime('-22 days')); ?></p>

        <h2>TP : Formulaire pour afficher un calendrier</h2>

        <form method="post" action="">
            <label for="month">Mois:</label>
            <select id="month" name="month">
                <?php
                for ($i = 1; $i <= 12; $i++) {
                    echo "<option value=\"$i\">$i</option>";
                }
                ?>
            </select>
            <label for="year">Année:</label>
            <select id="year" name="year">
                <?php
                for ($i = 2000; $i <= 2100; $i++) {
                    echo "<option value=\"$i\">$i</option>";
                }
                ?>
            </select>
            <input type="submit" value="Afficher le calendrier">
        </form>

        <?php
        if (isset($_POST['month']) && isset($_POST['year'])) {
            $month = intval($_POST['month']);
            $year = intval($_POST['year']);
            $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
            echo "<h2>Calendrier pour $month/$year</h2>";
            echo "<table border='1'>";
            echo "<tr><th>Dimanche</th><th>Lundi</th><th>Mardi</th><th>Mercredi</th><th>Jeudi</th><th>Vendredi</th><th>Samedi</th></tr>";
            $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);
            $dayOfWeek = date('w', $firstDayOfMonth);
            echo "<tr>";
            for ($blank = 0; $blank < $dayOfWeek; $blank++) {
                echo "<td></td>";
            }
            for ($day = 1; $day <= $daysInMonth; $day++) {
                if (($blank + $day - 1) % 7 == 0) {
                    echo "</tr><tr>";
                }
                echo "<td>$day</td>";
            }
            while (($blank + $day - 1) % 7 != 0) {
                echo "<td></td>";
                $day++;
            }
            echo "</tr>";
            echo "</table>";
        }
        ?>
    </div>
</div>

</body>
</html>
