<!DOCTYPE html>
<html>
<head>
    <title>Élèves et Compétences</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function toggleChart(element) {
            var chart = element.nextElementSibling;
            if (chart.style.display === "none" || chart.style.display === "") {
                chart.style.display = "block";
            } else {
                chart.style.display = "none";
            }
        }
    </script>
</head>
<body>

<div class="container">
    <h1>Liste des Élèves et leurs Compétences</h1>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "eleves_db";

    // Créer la connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Définir l'encodage de la connexion à UTF-8
    $conn->set_charset("utf8");

    $sql = "SELECT e.id, e.prenom, e.nom, ei.age, ei.ville, ei.avatar, c.titre, ec.niveau, ec.niveau_ae
            FROM eleves e
            JOIN eleves_informations ei ON e.id = ei.eleves_id
            JOIN eleves_competences ec ON e.id = ec.eleves_id
            JOIN competences c ON ec.competences_id = c.id
            ORDER BY e.id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $eleves = [];

        // Structurer les résultats dans un tableau associatif
        while($row = $result->fetch_assoc()) {
            $eleve_id = $row["id"];
            if (!isset($eleves[$eleve_id])) {
                $eleves[$eleve_id] = [
                    "prenom" => $row["prenom"],
                    "nom" => $row["nom"],
                    "age" => $row["age"],
                    "ville" => $row["ville"],
                    "avatar" => $row["avatar"],
                    "competences" => []
                ];
            }
            $eleves[$eleve_id]["competences"][] = [
                "titre" => $row["titre"],
                "niveau" => $row["niveau"],
                "niveau_ae" => $row["niveau_ae"]
            ];
        }

        // Afficher les résultats
        foreach ($eleves as $id => $eleve) {
            echo '<div class="student-card">';
            echo '<div class="card-header">Consulter une fiche Élève </div>';
            echo '<div class="card-section">';
            echo '<div class="section-title">Données personnelles</div>';
            echo '<div class="student-info">';
            echo '<div class="student-avatar">';
            echo '<img src="' . htmlspecialchars($eleve["avatar"]) . '" alt="Avatar">';
            echo '</div>';
            echo '<div class="student-details">';
            echo '<table>';
            echo '<tr><th>Nom :</th><td>' . htmlspecialchars($eleve["nom"]) . '</td></tr>';
            echo '<tr><th>Prénom :</th><td>' . htmlspecialchars($eleve["prenom"]) . '</td></tr>';
            echo '<tr><th>Âge :</th><td>' . $eleve["age"] . '</td></tr>';
            echo '<tr><th>Ville :</th><td>' . htmlspecialchars($eleve["ville"]) . '</td></tr>';
            echo '</table>';
            echo '</div>';
            echo '</div>';
            echo '<div class="section-title">Données pédagogiques</div>';
            echo '<h3>Compétences:</h3>';
            echo '<ul class="competence-list">';
            foreach ($eleve["competences"] as $index => $competence) {
                echo '<li>';
                echo '<p class="competence-title" onclick="toggleChart(this)">' . htmlspecialchars($competence["titre"]) . '</p>';
                echo '<div class="competence-chart">';
                echo '<canvas id="polarChart' . $id . '_' . $index . '"></canvas>';
                echo '</div>';
                echo '<script>
                var ctx = document.getElementById("polarChart' . $id . '_' . $index . '").getContext("2d");
                var data = {
                    labels: ["' . addslashes($competence["titre"]) . '"],
                    datasets: [{
                        label: "Niveau",
                        data: [' . $competence["niveau"] . '],
                        backgroundColor: "rgba(255, 99, 132, 0.2)",
                        borderColor: "rgba(255, 99, 132, 1)",
                        borderWidth: 1
                    }, {
                        label: "Niveau Auto-évalué",
                        data: [' . $competence["niveau_ae"] . '],
                        backgroundColor: "rgba(54, 162, 235, 0.2)",
                        borderColor: "rgba(54, 162, 235, 1)",
                        borderWidth: 1
                    }]
                };
                var options = {
                    scale: {
                        ticks: {
                            beginAtZero: true,
                            max: 10
                        }
                    }
                };
                var polarChart = new Chart(ctx, {
                    type: "polarArea",
                    data: data,
                    options: options
                });
                </script>';
                echo '</li>';
            }
            echo '</ul>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Aucun résultat trouvé.</div>';
    }

    $conn->close();
    ?>

</div>

</body>
</html>
