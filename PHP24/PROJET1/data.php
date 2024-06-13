<?php

    $eleves = [
        0 => [
            "nom" => "Dupont",
            "prenom" => "Brian",
            "age" => 17,
            "genre" => "Homme",
            "ville" => "Lille",
            "passions" => ["Football", "Lecture", "Jeux vidéo"]
        ],
        1 => [
            "nom" => "Martin",
            "prenom" => "André",
            "age" => 17,
            "genre" => "Homme",
            "ville" => "Lille",
            "passions" => ["Basketball", "Cinéma", "Musique"]
        ],
        2 => [
            "nom" => "Durand",
            "prenom" => "Julie",
            "age" => 17,
            "genre" => "Femme",
            "ville" => "Lille",
            "passions" => ["Danse", "Peinture", "Voyages"]
        ],
        3 => [
            "nom" => "Lemoine",
            "prenom" => "Sophie",
            "age" => 17,
            "genre" => "Femme",
            "ville" => "Lille",
            "passions" => ["Natation", "Voyages", "Cuisine"]
        ],
        4 => [
            "nom" => "Girard",
            "prenom" => "Lucas",
            "genre" => "Homme",
            "age" => 17,
            "ville" => "Lille",
            "passions" => ["Escalade", "Musique", "Photographie"]
        ],
        5 => [
            "nom" => "Moreau",
            "prenom" => "Emma",
            "age" => 17,
            "genre" => "Femme",
            "ville" => "Lille",
            "passions" => ["Théâtre", "Lecture", "Randonnée"]
        ],
        6 => [
            "nom" => "Perrin",
            "prenom" => "Maxime",
            "age" => 17,
            "genre" => "Homme",
            "ville" => "Lille",
            "passions" => ["Jeux vidéo", "Cyclisme", "Pêche"]
        ],
        7 => [
            "nom" => "Rousseau",
            "prenom" => "Chloé",
            "age" => 17,
            "genre" => "Femme",
            "ville" => "Lille",
            "passions" => ["Danse", "Musique", "Voyages"]
        ],
        8 => [
            "nom" => "Bernard",
            "prenom" => "Hugo",
            "age" => 17,
            "genre" => "Homme",
            "ville" => "Lille",
            "passions" => ["Football", "Lecture", "Peinture"]
        ],
        9 => [
            "nom" => "Durant",
            "prenom" => "Alice",
            "age" => 17,
            "genre" => "Femme",
            "ville" => "Lille",
            "passions" => ["Photographie", "Cinéma", "Cuisine"]
        ],
        10 => [
            "nom" => "Lefevre",
            "prenom" => "Julien",
            "age" => 17,
            "genre" => "Homme",
            "ville" => "Lille",
            "passions" => ["Tennis", "Lecture", "Voyages"]
        ],
        11 => [
            "nom" => "Lopez",
            "prenom" => "Camille",
            "age" => 17,
            "genre" => "Femme",
            "ville" => "Lille",
            "passions" => ["Musique", "Danse", "Peinture"]
        ],
        12 => [
            "nom" => "Muller",
            "prenom" => "Arthur",
            "age" => 17,
            "genre" => "Homme",
            "ville" => "Lille",
            "passions" => ["Escalade", "Lecture", "Jeux vidéo"]
        ],
        13 => [
            "nom" => "Leroy",
            "prenom" => "Sophie",
            "age" => 17,
            "genre" => "Femme",
            "ville" => "Lille",
            "passions" => ["Football", "Musique", "Voyages"]
        ],
        14 => [
            "nom" => "Fontaine",
            "prenom" => "Théo",
            "age" => 17,
            "genre" => "Homme",
            "ville" => "Lille",
            "passions" => ["Basketball", "Cinéma", "Randonnée"]
        ],
        15 => [
            "nom" => "Robin",
            "prenom" => "Laura",
            "age" => 17,
            "genre" => "Femme",
            "ville" => "Lille",
            "passions" => ["Natation", "Cuisine", "Voyages"]
        ],
        16 => [
            "nom" => "Garnier",
            "prenom" => "Luc",
            "age" => 17,
            "genre" => "Homme",
            "ville" => "Lille",
            "passions" => ["Football", "Lecture", "Théâtre"]
        ],
        17 => [
            "nom" => "Faure",
            "prenom" => "Nina",
            "age" => 17,
            "genre" => "Femme",
            "ville" => "Lille",
            "passions" => ["Musique", "Danse", "Photographie"]
        ],
        18 => [
            "nom" => "Dumont",
            "prenom" => "Éric",
            "age" => 17,
            "genre" => "Homme",
            "ville" => "Lille",
            "passions" => ["Escalade", "Cinéma", "Voyages"]
        ],
        19 => [
            "nom" => "Blanc",
            "prenom" => "Isabelle",
            "age" => 17,
            "genre" => "Femme",
            "ville" => "Lille",
            "passions" => ["Randonnée", "Peinture", "Lecture"]
        ],
        20 => [
            "nom" => "Flore",
            "prenom" => "Romain",
            "age" => 17,
            "genre" => "Homme",
            "ville" => "Lille",
            "passions" => ["Randonnée", "Football", "Equitation"]
        ]
    ];

    if (isset($_GET['index']) && isset($eleves[$_GET['index']])) {
        $index = $_GET['index'];
        $eleve = $eleves[$index];
    } else {
        $eleve = null;
    }
?>
