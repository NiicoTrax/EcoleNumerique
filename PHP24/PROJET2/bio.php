<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$correct_password = "fourmies59";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = $_POST['password'];
    if ($password == $correct_password) {
        $_SESSION['logged_in'] = true;
    } else {
        header('Location: login.php?error=1');
        exit();
    }
}

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    include('header.php');
    echo '<div class="message-container"><p class="login-message">Veuillez vous connecter pour accéder à cette page</p></div>';
    include('footer.php');
    exit();
}

include('assets/includes/header.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Projet 2 - Bio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="bio-container">
        <div class="bio-image">
            <img src="assets/images/bio-image.jpg" alt="Bio Image">
        </div>
        <div class="bio-content">
            <h2>À propos de moi</h2>
            <p>Je suis un développeur web passionné avec plus de 10 ans d'expérience dans la création de sites web dynamiques et interactifs. J'ai travaillé sur divers projets allant des sites web personnels aux plateformes de commerce électronique à grande échelle.</p>
            <p>J'ai une forte expertise en HTML, CSS, JavaScript, PHP, et MySQL. Je suis constamment à la recherche de nouvelles technologies et de meilleures pratiques pour améliorer mes compétences et offrir des solutions de haute qualité.</p>
            <br>
            <h3>Compétences</h3>
            <ul>
                <li>Développement Front-End: HTML, CSS, JavaScript, React</li>
                <div class="skill-bar">
                    <span>HTML</span>
                    <div class="progress">
                        <div class="progress-bar" data-progress="100"></div>
                    </div>
                </div>
                <div class="skill-bar">
                    <span>CSS</span>
                    <div class="progress">
                        <div class="progress-bar" data-progress="100"></div>
                    </div>
                </div>
                <div class="skill-bar">
                    <span>JavaScript</span>
                    <div class="progress">
                        <div class="progress-bar" data-progress="80"></div>
                    </div>
                </div>
                <div class="skill-bar">
                    <span>React</span>
                    <div class="progress">
                        <div class="progress-bar" data-progress="10"></div>
                    </div>
                </div>
                <li>Développement Back-End: PHP, Node.js, Python</li>
                <div class="skill-bar">
                    <span>PHP</span>
                    <div class="progress">
                        <div class="progress-bar" data-progress="80"></div>
                    </div>
                </div>
                <div class="skill-bar">
                    <span>Node.js</span>
                    <div class="progress">
                        <div class="progress-bar" data-progress="10"></div>
                    </div>
                </div>
                <div class="skill-bar">
                    <span>Python</span>
                    <div class="progress">
                        <div class="progress-bar" data-progress="10"></div>
                    </div>
                </div>
                <li>Base de données: MySQL, PostgreSQL, MongoDB</li>
                <div class="skill-bar">
                    <span>MySQL</span>
                    <div class="progress">
                        <div class="progress-bar" data-progress="80"></div>
                    </div>
                </div>
                <div class="skill-bar">
                    <span>PostgreSQL</span>
                    <div class="progress">
                        <div class="progress-bar" data-progress="75"></div>
                    </div>
                </div>
                <div class="skill-bar">
                    <span>MongoDB</span>
                    <div class="progress">
                        <div class="progress-bar" data-progress="70"></div>
                    </div>
                </div>
                <li>Outils de versionnement: Git, GitHub</li>
                <div class="skill-bar">
                    <span>Git</span>
                    <div class="progress">
                        <div class="progress-bar" data-progress="100"></div>
                    </div>
                </div>
                <div class="skill-bar">
                    <span>GitHub</span>
                    <div class="progress">
                        <div class="progress-bar" data-progress="100"></div>
                    </div>
                </div>
            </ul>
            <h3>Projets récents</h3>
            <ul>
                <li><strong>Création d'un jeu Quiz</strong>: Développement d'une plateforme de jeu de quizz en ligne complète avec plusieurs thèmes disponible.</li>
                <li><strong>Création d'une fiche Eleve</strong>: Création d'un site web permettant aux utilisateurs de consulter une fiche élève disponible.</li>
            </ul>
        </div>
    </div>
    <?php include('assets/includes/footer.php'); ?>
    <script src="assets/js/script.js"></script>
</body>
</html>
