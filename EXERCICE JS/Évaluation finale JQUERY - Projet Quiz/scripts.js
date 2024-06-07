$(document).ready(function() {
    const questions = {
        geographie: [
            { question: "Quelle est la capitale de la France?", options: ["Paris", "Marseille", "Lyon", "Nice"], answer: 0 },
            { question: "Quel est le plus grand océan sur Terre?", options: ["Océan Atlantique", "Océan Indien", "Océan Pacifique", "Océan Arctique"], answer: 2 },
            { question: "Quel est le plus grand désert du monde?", options: ["Désert de Gobi", "Désert d'Arabie", "Désert de Kalahari", "Désert du Sahara"], answer: 3 },
            { question: "Quelle est la plus haute montagne du monde?", options: ["Mont Blanc", "Mont Kilimandjaro", "Mont Everest", "Mont McKinley"], answer: 2 },
            { question: "Quelle est la plus grande île du monde?", options: ["Groenland", "Madagascar", "Bornéo", "Nouvelle-Guinée"], answer: 0 },
            { question: "Quel est le plus long fleuve du monde?", options: ["Nil", "Amazone", "Yangtsé", "Mississippi"], answer: 1 },
            { question: "Quelle est la plus petite nation indépendante du monde?", options: ["Malte", "Maldives", "Monaco", "Vatican"], answer: 3 },
            { question: "Quelle est la capitale de l'Australie?", options: ["Sydney", "Melbourne", "Canberra", "Brisbane"], answer: 2 },
            { question: "Quel pays a la plus grande superficie?", options: ["Canada", "Chine", "États-Unis", "Russie"], answer: 3 },
            { question: "Quel continent a le plus grand nombre de pays?", options: ["Afrique", "Asie", "Europe", "Amérique du Nord"], answer: 0 },
            { question: "Quelle est la capitale du Japon?", options: ["Tokyo", "Osaka", "Kyoto", "Nagoya"], answer: 0 },
            { question: "Quelle est la plus haute cascade du monde?", options: ["Chutes du Niagara", "Salto Angel", "Chutes Victoria", "Chutes de l'Iguazú"], answer: 1 },
            { question: "Quelle mer est la plus salée?", options: ["Mer Morte", "Mer Rouge", "Mer Méditerranée", "Mer Caspienne"], answer: 0 },
            { question: "Quel pays est surnommé le 'pays du soleil levant'?", options: ["Chine", "Thaïlande", "Corée du Sud", "Japon"], answer: 3 },
            { question: "Quel désert est le plus vaste au monde?", options: ["Désert de Gobi", "Désert d'Arabie", "Désert du Sahara", "Antarctique"], answer: 3 },
            { question: "Quelle est la capitale du Canada?", options: ["Toronto", "Vancouver", "Montréal", "Ottawa"], answer: 3 },
            { question: "Quel pays possède la plus grande population?", options: ["Inde", "États-Unis", "Chine", "Indonésie"], answer: 2 },
            { question: "Quel est le plus grand lac du monde par superficie?", options: ["Lac Supérieur", "Lac Victoria", "Lac Tanganyika", "Mer Caspienne"], answer: 3 },
            { question: "Quel pays possède le plus grand nombre de volcans actifs?", options: ["Indonésie", "Japon", "États-Unis", "Italie"], answer: 0 },
            { question: "Quelle est la capitale de l'Italie?", options: ["Milan", "Rome", "Venise", "Florence"], answer: 1 },
        ],
        culture: [
            { question: "Qui a écrit 'Les Misérables'?", options: ["Victor Hugo", "Émile Zola", "Albert Camus", "Gustave Flaubert"], answer: 0 },
            { question: "En quelle année a eu lieu la Révolution française?", options: ["1789", "1776", "1804", "1815"], answer: 0 },
            { question: "Quel est le plus grand tableau du monde?", options: ["La Joconde", "La Cène", "Guernica", "La Nuit étoilée"], answer: 1 },
            { question: "Qui est l'auteur de 'Roméo et Juliette'?", options: ["William Shakespeare", "Charles Dickens", "Jane Austen", "Mark Twain"], answer: 0 },
            { question: "Quel est le plus ancien musée du monde?", options: ["Le Louvre", "Le British Museum", "Le Musée de l'Ermitage", "Le Musée du Caire"], answer: 1 },
            { question: "Qui a peint la fresque de la Chapelle Sixtine?", options: ["Leonardo da Vinci", "Raphaël", "Michel-Ange", "Botticelli"], answer: 2 },
            { question: "Quel est le plus grand opéra du monde?", options: ["Metropolitan Opera House", "La Scala", "Opéra de Sydney", "Royal Opera House"], answer: 0 },
            { question: "Qui a écrit 'À la recherche du temps perdu'?", options: ["Marcel Proust", "Gustave Flaubert", "Victor Hugo", "Émile Zola"], answer: 0 },
            { question: "Quel est le plus grand temple religieux du monde?", options: ["Angkor Wat", "Le Parthénon", "Notre-Dame de Paris", "La Sagrada Familia"], answer: 0 },
            { question: "Quel est le plus ancien film de l'histoire?", options: ["L'arrivée d'un train en gare de La Ciotat", "Le Voyage dans la Lune", "La Sortie de l'usine Lumière à Lyon", "Le Vol du grand rapide"], answer: 2 },
            { question: "Qui a écrit 'Le Petit Prince'?", options: ["Antoine de Saint-Exupéry", "Jules Verne", "Albert Camus", "Victor Hugo"], answer: 0 },
            { question: "Quel est le plus grand opéra de Verdi?", options: ["La Traviata", "Aida", "Rigoletto", "Nabucco"], answer: 1 },
            { question: "Qui est le compositeur de la 5ème symphonie?", options: ["Mozart", "Bach", "Beethoven", "Tchaïkovski"], answer: 2 },
            { question: "Quel est le plus grand roman de Tolkien?", options: ["Le Silmarillion", "Le Hobbit", "Les Enfants de Húrin", "Le Seigneur des Anneaux"], answer: 3 },
            { question: "Quel est le plus grand sculpteur de la Renaissance?", options: ["Donatello", "Raphaël", "Michel-Ange", "Leonardo da Vinci"], answer: 2 },
            { question: "Qui a peint 'La Nuit étoilée'?", options: ["Pablo Picasso", "Vincent van Gogh", "Claude Monet", "Paul Cézanne"], answer: 1 },
            { question: "Quel est le plus grand monument de Paris?", options: ["Tour Eiffel", "Arc de Triomphe", "Notre-Dame", "Sacré-Cœur"], answer: 0 },
            { question: "Qui est l'auteur de '1984'?", options: ["Aldous Huxley", "George Orwell", "Ray Bradbury", "Isaac Asimov"], answer: 1 },
            { question: "Quel est le plus grand opéra de Wagner?", options: ["Le Vaisseau fantôme", "Parsifal", "Tristan et Isolde", "L'Anneau du Nibelung"], answer: 3 },
            { question: "Qui a écrit 'Le Comte de Monte-Cristo'?", options: ["Victor Hugo", "Honoré de Balzac", "Alexandre Dumas", "Émile Zola"], answer: 2 },
        ],
        cinema: [
            { question: "Qui a réalisé le film 'Inception'?", options: ["Christopher Nolan", "Steven Spielberg", "James Cameron", "Quentin Tarantino"], answer: 0 },
            { question: "Quel film a remporté l'Oscar du meilleur film en 2020?", options: ["1917", "Joker", "Parasite", "Once Upon a Time in Hollywood"], answer: 2 },
            { question: "Qui a joué le rôle principal dans 'Gladiator'?", options: ["Russell Crowe", "Brad Pitt", "Leonardo DiCaprio", "Tom Hanks"], answer: 0 },
            { question: "Quel film a lancé la carrière de Leonardo DiCaprio?", options: ["Titanic", "Inception", "Romeo + Juliet", "What's Eating Gilbert Grape"], answer: 3 },
            { question: "Qui a réalisé 'Pulp Fiction'?", options: ["Martin Scorsese", "Quentin Tarantino", "Guy Ritchie", "David Fincher"], answer: 1 },
            { question: "Quel film a popularisé la phrase 'I'll be back'?", options: ["Commando", "Predator", "Terminator", "Total Recall"], answer: 2 },
            { question: "Qui a réalisé 'E.T. l'extra-terrestre'?", options: ["James Cameron", "George Lucas", "Steven Spielberg", "Ridley Scott"], answer: 2 },
            { question: "Quel film a remporté le plus d'Oscars?", options: ["Titanic", "Ben-Hur", "Le Seigneur des Anneaux : Le Retour du Roi", "Tous les précédents"], answer: 3 },
            { question: "Quel est le premier film d'animation en couleur?", options: ["Blanche-Neige et les Sept Nains", "Pinocchio", "Fantasia", "Dumbo"], answer: 0 },
            { question: "Qui a joué le rôle de Jack Dawson dans 'Titanic'?", options: ["Brad Pitt", "Johnny Depp", "Tom Cruise", "Leonardo DiCaprio"], answer: 3 },
            { question: "Quel film a été réalisé par Peter Jackson?", options: ["Harry Potter", "Le Seigneur des Anneaux", "Star Wars", "Avatar"], answer: 1 },
            { question: "Quel film de Disney a pour personnage principal Simba?", options: ["Aladdin", "Le Roi Lion", "Mulan", "Pocahontas"], answer: 1 },
            { question: "Qui a réalisé le film '2001 : L'Odyssée de l'espace'?", options: ["Stanley Kubrick", "Ridley Scott", "Alfred Hitchcock", "Francis Ford Coppola"], answer: 0 },
            { question: "Quel film a popularisé la danse du moonwalk?", options: ["Flashdance", "Dirty Dancing", "Moonwalker", "Saturday Night Fever"], answer: 2 },
            { question: "Quel acteur a joué dans 'Mission : Impossible'?", options: ["Tom Hanks", "Tom Cruise", "Matt Damon", "Keanu Reeves"], answer: 1 },
            { question: "Quel film a popularisé la phrase 'Hasta la vista, baby'?", options: ["Commando", "Predator", "Terminator 2", "Total Recall"], answer: 2 },
            { question: "Qui a réalisé 'Le Parrain'?", options: ["Martin Scorsese", "Brian De Palma", "Francis Ford Coppola", "Sergio Leone"], answer: 2 },
            { question: "Quel film a popularisé la phrase 'Here's Johnny!'?", options: ["Carrie", "The Shining", "Misery", "Christine"], answer: 1 },
            { question: "Quel film a pour personnage principal un ogre nommé Shrek?", options: ["Shrek", "Shrek 2", "Shrek le Troisième", "Shrek 4"], answer: 0 },
            { question: "Quel film a popularisé la phrase 'You can't handle the truth!'", options: ["A Few Good Men", "The Firm", "Rain Man", "Top Gun"], answer: 0 },
        ],
        sport: [
            { question: "Quel pays a remporté la Coupe du Monde de la FIFA en 2018?", options: ["Allemagne", "Brésil", "Argentine", "France"], answer: 3 },
            { question: "Qui détient le record du monde du 100 mètres?", options: ["Usain Bolt", "Tyson Gay", "Yohan Blake", "Asafa Powell"], answer: 0 },
            { question: "Quel joueur de basketball est surnommé 'Air Jordan'?", options: ["LeBron James", "Kobe Bryant", "Michael Jordan", "Shaquille O'Neal"], answer: 2 },
            { question: "Quel pays a organisé les Jeux Olympiques de 2012?", options: ["Chine", "Brésil", "Royaume-Uni", "Grèce"], answer: 2 },
            { question: "Quel est le sport le plus pratiqué dans le monde?", options: ["Basketball", "Cricket", "Football", "Tennis"], answer: 2 },
            { question: "Quel joueur de tennis a remporté le plus de titres du Grand Chelem?", options: ["Rafael Nadal", "Novak Djokovic", "Roger Federer", "Pete Sampras"], answer: 2 },
            { question: "Quel pays est le plus titré en Coupe du Monde de rugby?", options: ["Nouvelle-Zélande", "Afrique du Sud", "Angleterre", "Australie"], answer: 0 },
            { question: "Qui est considéré comme le meilleur boxeur de tous les temps?", options: ["Mike Tyson", "Muhammad Ali", "Floyd Mayweather", "Manny Pacquiao"], answer: 1 },
            { question: "Quel est le sport national du Canada?", options: ["Hockey sur glace", "Football", "Baseball", "Basketball"], answer: 0 },
            { question: "Quel joueur de football a remporté le plus de Ballons d'Or?", options: ["Cristiano Ronaldo", "Lionel Messi", "Michel Platini", "Johan Cruyff"], answer: 1 },
            { question: "Quel est le sport le plus regardé à la télévision?", options: ["Basketball", "Cricket", "Football", "Tennis"], answer: 2 },
            { question: "Quel pays a remporté le plus de médailles aux Jeux Olympiques?", options: ["Russie", "États-Unis", "Chine", "Royaume-Uni"], answer: 1 },
            { question: "Quel est le plus ancien tournoi de tennis du monde?", options: ["US Open", "Roland-Garros", "Wimbledon", "Open d'Australie"], answer: 2 },
            { question: "Qui est le joueur de golf le plus titré de l'histoire?", options: ["Tiger Woods", "Jack Nicklaus", "Arnold Palmer", "Ben Hogan"], answer: 1 },
            { question: "Quel sport se joue avec un volant et des raquettes?", options: ["Tennis", "Squash", "Badminton", "Ping-pong"], answer: 2 },
            { question: "Quel est le plus célèbre circuit de Formule 1?", options: ["Monza", "Silverstone", "Spa-Francorchamps", "Monaco"], answer: 3 },
            { question: "Quel pays a remporté le plus de titres en Coupe du Monde de cricket?", options: ["Inde", "Angleterre", "Australie", "Pakistan"], answer: 2 },
            { question: "Quel joueur de football est surnommé 'Le Roi'?", options: ["Diego Maradona", "Pele", "Johan Cruyff", "George Best"], answer: 1 },
            { question: "Quel est le sport le plus populaire en Inde?", options: ["Football", "Hockey sur glace", "Cricket", "Tennis"], answer: 2 },
            { question: "Quel joueur de tennis a gagné 13 fois Roland-Garros?", options: ["Roger Federer", "Novak Djokovic", "Rafael Nadal", "Bjorn Borg"], answer: 2 },
        ],
        code_de_la_route: [
            { question: "Que signifie ce panneau de signalisation?", options: ["Danger", "Priorité", "Interdiction", "Obligation"], answer: 0, icon: "fa-exclamation-triangle" },
            { question: "Quelle est la vitesse maximale autorisée en agglomération?", options: ["30 km/h", "50 km/h", "70 km/h", "90 km/h"], answer: 1, icon: "fa-tachometer-alt" },
            { question: "Que doit-on faire lorsqu'un feu de signalisation est rouge?", options: ["Accélérer", "Ralentir", "S'arrêter", "Tourner à droite"], answer: 2, icon: "fa-hand-paper" },
            { question: "Quelle est la distance de sécurité recommandée entre deux véhicules?", options: ["10 mètres", "20 mètres", "30 mètres", "50 mètres"], answer: 2, icon: "fa-car" },
            { question: "Que signifie ce panneau de signalisation?", options: ["Interdiction de tourner à droite", "Route barrée", "Sens interdit", "Priorité à droite"], answer: 2, icon: "fa-ban" },
            { question: "Quelle est la vitesse maximale autorisée sur une autoroute en France?", options: ["100 km/h", "110 km/h", "120 km/h", "130 km/h"], answer: 3, icon: "fa-tachometer-alt" },
            { question: "Que doit-on faire lorsqu'un bus scolaire s'arrête pour faire descendre des enfants?", options: ["Accélérer", "Dépasser le bus", "S'arrêter", "Klaxonner"], answer: 2, icon: "fa-bus" },
            { question: "Quelle est la signification des lignes jaunes sur la chaussée?", options: ["Stationnement interdit", "Voie réservée", "Travaux", "Passage piéton"], answer: 2, icon: "fa-road" },
            { question: "Que signifie ce panneau de signalisation?", options: ["Obligation de tourner à droite", "Obligation de tourner à gauche", "Obligation de continuer tout droit", "Fin d'obligation"], answer: 2, icon: "fa-arrow-right" },
            { question: "Quelle est la signification d'un feu de signalisation clignotant orange?", options: ["S'arrêter", "Priorité à droite", "Ralentir et passer avec prudence", "Tourner à droite"], answer: 2, icon: "fa-traffic-light" },
            { question: "Que doit-on faire en cas de panne sur une autoroute?", options: ["Continuer à rouler", "S'arrêter sur la voie de droite", "Se garer sur la bande d'arrêt d'urgence", "Klaxonner"], answer: 2, icon: "fa-tools" },
            { question: "Que signifie ce panneau de signalisation?", options: ["Interdiction de dépasser", "Stationnement interdit", "Route glissante", "Interdiction de tourner à droite"], answer: 0, icon: "fa-ban" },
            { question: "Quelle est la vitesse maximale autorisée sur une route nationale en France?", options: ["70 km/h", "80 km/h", "90 km/h", "100 km/h"], answer: 2, icon: "fa-tachometer-alt" },
            { question: "Que doit-on faire lorsqu'un piéton traverse sur un passage piéton?", options: ["Accélérer", "S'arrêter", "Klaxonner", "Dépasser"], answer: 1, icon: "fa-walking" },
            { question: "Quelle est la signification des lignes blanches continues sur la chaussée?", options: ["Interdiction de dépasser", "Voie réservée", "Stationnement interdit", "Passage piéton"], answer: 0, icon: "fa-road" },
            { question: "Que doit-on faire lorsqu'un cycliste circule sur la chaussée?", options: ["Accélérer", "Ralentir et garder une distance de sécurité", "Klaxonner", "Dépasser sans précaution"], answer: 1, icon: "fa-bicycle" },
            { question: "Que signifie ce panneau de signalisation?", options: ["Route barrée", "Sens interdit", "Priorité à la circulation venant en sens inverse", "Route à sens unique"], answer: 2, icon: "fa-arrow-left" },
            { question: "Quelle est la signification des bandes blanches sur une route?", options: ["Voie réservée", "Travaux", "Passage piéton", "Interdiction de stationner"], answer: 2, icon: "fa-road" },
            { question: "Que doit-on faire lorsqu'un véhicule de secours arrive derrière avec ses sirènes?", options: ["Accélérer", "Ralentir", "S'arrêter", "Se ranger sur le côté pour le laisser passer"], answer: 3, icon: "fa-ambulance" },
            { question: "Que signifie ce panneau de signalisation?", options: ["Obligation de tourner à gauche", "Obligation de tourner à droite", "Obligation de continuer tout droit", "Fin d'obligation"], answer: 2, icon: "fa-arrow-up" },
        ]
    };

    function shuffle(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
    }

    let currentQuestion = 0;
    let score = 0;
    let userAnswers = [];
    let selectedQuestions = [];

    $('.theme-btn').click(function() {
        const theme = $(this).data('theme');
        selectedQuestions = [...questions[theme]]; // Copier les questions sélectionnées
        shuffle(selectedQuestions); // Mélanger les questions avant de commencer
        $('#start-screen').fadeOut(500, function() {
            $('#question-screen').removeClass('d-none').fadeIn(500);
            displayQuestion();
        });
    });

    $('#next-btn').click(function() {
        let selectedOption = $('input[name="option"]:checked').val();
        if (selectedOption === undefined) {
            alert("Veuillez sélectionner une réponse");
            return;
        }

        userAnswers.push(selectedOption);
        if (selectedOption == selectedQuestions[currentQuestion].answer) {
            score++;
        }

        currentQuestion++;
        if (currentQuestion < selectedQuestions.length) {
            $('#question-screen').fadeOut(500, function() {
                displayQuestion();
                $('#question-screen').fadeIn(500);
            });
        } else {
            displayResults();
        }
    });

    $('#retour-btn').click(function() {
        $('#question-screen').fadeOut(500, function() {
            $('#start-screen').fadeIn(500);
        });
        currentQuestion = 0;
        score = 0;
        userAnswers = [];
    });

    $('#restart-btn').click(function() {
        $('#result-screen').fadeOut(500, function() {
            $('#start-screen').fadeIn(500);
        });
        currentQuestion = 0;
        score = 0;
        userAnswers = [];
    });

    function displayQuestion() {
        let q = selectedQuestions[currentQuestion];
        $('#question-number').text(`Question ${currentQuestion + 1} / ${selectedQuestions.length}`);
        $('#question-text').text(q.question);
        $('#options-container').empty();

        // Afficher l'icône si elle existe
        if (q.icon) {
            $('#question-text').append(`<br><i class="fas ${q.icon} fa-3x mt-3"></i>`);
        }

        q.options.forEach((option, index) => {
            $('#options-container').append(`
                <div class="col option">
                    <input type="radio" id="option${index}" name="option" class="custom-control-input" value="${index}">
                    <label class="custom-control-label" for="option${index}" data-option="${String.fromCharCode(65 + index)}">${option}</label>
                </div>
            `);
        });
        $('#next-btn').show();
    }

    function displayResults() {
        $('#question-screen').hide();
        $('#result-screen').show();
        $('#score').text(`Vous avez obtenu ${score} sur ${selectedQuestions.length}`);
        let summaryHtml = '';
        let delay = 0;
        selectedQuestions.forEach((q, index) => {
            let isCorrect = userAnswers[index] == q.answer;
            let answerClass = isCorrect ? 'correct' : 'incorrect';
            summaryHtml += `
                <div class="result-item ${answerClass}" style="display: none;">
                    <p><strong>Question:</strong> ${q.question}</p>
                    ${q.icon ? `<i class="fas ${q.icon} fa-3x mt-3"></i>` : ''}
                    <p><strong>Votre réponse:</strong> ${q.options[userAnswers[index]]}</p>
                    <p><strong>Bonne réponse:</strong> ${q.options[q.answer]}</p>
                    <hr>
                </div>
            `;
        });
        $('#summary').html(summaryHtml);

        $('.result-item').each(function(index) {
            $(this).delay(delay).fadeIn(500);
            delay += 500;
        });
    }
});
