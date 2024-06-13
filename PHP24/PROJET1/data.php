<?php

    $eleves = [
        0 => [
            "nom" => "Dupont",
            "prenom" => "Brian",
            "age" => 17,
            "genre" => "Masculin",
            "ville" => "Lille",
            "passions" => ["Chant", "Snowboard", "Cyclisme", "Lecture"]
        ],
        1 => [
            "nom" => "Martin",
            "prenom" => "André",
            "age" => 17,
            "genre" => "Masculin",
            "ville" => "Lille",
            "passions" => ["Couture", "Canoë", "Sculpture", "Théâtre"]
        ],
        2 => [
            "nom" => "Durand",
            "prenom" => "Julie",
            "age" => 17,
            "genre" => "Feminin",
            "ville" => "Lille",
            "passions" => ["Yoga", "Plongée", "Théâtre", "Course à pied"]
        ],
        3 => [
            "nom" => "Lemoine",
            "prenom" => "Sophie",
            "age" => 17,
            "genre" => "Feminin",
            "ville" => "Lille",
            "passions" => ["Tennis", "Ping-pong", "Handball", "Cyclisme"]
        ],
        4 => [
            "nom" => "Girard",
            "prenom" => "Lucas",
            "genre" => "Masculin",
            "age" => 17,
            "ville" => "Lille",
            "passions" => ["Cinéma", "Basketball", "Karaté", "Musique"]
        ],
        5 => [
            "nom" => "Moreau",
            "prenom" => "Emma",
            "age" => 17,
            "genre" => "Feminin",
            "ville" => "Lille",
            "passions" => ["Volleyball", "Cyclisme", "Kayak", "Karaté"]
        ],
        6 => [
            "nom" => "Perrin",
            "prenom" => "Maxime",
            "age" => 17,
            "genre" => "Masculin",
            "ville" => "Lille",
            "passions" => ["Hockey", "Rugby", "Couture", "Informatique"]
        ],
        7 => [
            "nom" => "Rousseau",
            "prenom" => "Chloé",
            "age" => 17,
            "genre" => "Feminin",
            "ville" => "Lille",
            "passions" => ["Jardinage", "Surf", "Escalade", "Plongée"]
        ],
        8 => [
            "nom" => "Bernard",
            "prenom" => "Hugo",
            "age" => 17,
            "genre" => "Masculin",
            "ville" => "Lille",
            "passions" => ["Ping-pong", "Théâtre", "Hockey", "Cinéma"]
        ],
        9 => [
            "nom" => "Durant",
            "prenom" => "Alice",
            "age" => 17,
            "genre" => "Feminin",
            "ville" => "Lille",
            "passions" => ["Broderie", "Randonnée", "Musique", "Danse"]
        ],
        10 => [
            "nom" => "Lefevre",
            "prenom" => "Julien",
            "age" => 17,
            "genre" => "Masculin",
            "ville" => "Lille",
            "passions" => ["Ski", "Snowboard", "Écriture", "Équitation"]
        ],
        11 => [
            "nom" => "Lopez",
            "prenom" => "Camille",
            "age" => 17,
            "genre" => "Feminin",
            "ville" => "Lille",
            "passions" => ["Badminton", "Couture", "Vélo", "Randonnée"]
        ],
        12 => [
            "nom" => "Muller",
            "prenom" => "Arthur",
            "age" => 17,
            "genre" => "Masculin",
            "ville" => "Lille",
            "passions" => ["Aquariophilie", "Tricot", "Handball", "Théâtre"]
        ],
        13 => [
            "nom" => "Leroy",
            "prenom" => "Sophie",
            "age" => 17,
            "genre" => "Feminin",
            "ville" => "Lille",
            "passions" => ["Volleyball", "Badminton", "Karaté", "Course à pied"]
        ],
        14 => [
            "nom" => "Fontaine",
            "prenom" => "Théo",
            "age" => 17,
            "genre" => "Masculin",
            "ville" => "Lille",
            "passions" => ["Pêche", "Boxe", "Yoga", "Handball"]
        ],
        15 => [
            "nom" => "Robin",
            "prenom" => "Laura",
            "age" => 17,
            "genre" => "Feminin",
            "ville" => "Lille",
            "passions" => ["Cyclisme", "Jardinage", "Football", "Ping-pong"]
        ],
        16 => [
            "nom" => "Garnier",
            "prenom" => "Luc",
            "age" => 17,
            "genre" => "Masculin",
            "ville" => "Lille",
            "passions" => ["Voyage", "Badminton", "Escalade", "Golf"]
        ],
        17 => [
            "nom" => "Faure",
            "prenom" => "Nina",
            "age" => 17,
            "genre" => "Feminin",
            "ville" => "Lille",
            "passions" => ["Sculpture", "Astronomie", "Vélo", "Snowboard"]
        ],
        18 => [
            "nom" => "Dumont",
            "prenom" => "Éric",
            "age" => 17,
            "genre" => "Masculin",
            "ville" => "Lille",
            "passions" => ["Équitation", "Tricot", "Patinage", "Ski"]
        ],
        19 => [
            "nom" => "Blanc",
            "prenom" => "Isabelle",
            "age" => 17,
            "genre" => "Feminin",
            "ville" => "Lille",
            "passions" => ["Pêche", "Patinage", "Informatique", "Peinture"]
        ],
        20 => [
            "nom" => "Flore",
            "prenom" => "Romain",
            "age" => 17,
            "genre" => "Masculin",
            "ville" => "Lille",
            "passions" => ["Écriture", "Snowboard", "Karaté", "Ping-pong"]
        ]
    ];

    if (isset($_GET['index']) && isset($eleves[$_GET['index']])) {
        $index = $_GET['index'];
        $eleve = $eleves[$index];
    } else {
        $eleve = null;
    }
?>
