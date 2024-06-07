$(document).ready(function() {
    // Shuffle an array using Fisher-Yates (Knuth) Shuffle
    function shuffle(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
    }

    // Initialize variables
    let currentQuestion = 0;
    let score = 0;
    let userAnswers = [];
    let selectedQuestions = [];

    // Event listener for theme buttons
    $('.theme-btn').click(function() {
        const theme = $(this).data('theme');
        selectedQuestions = [...questions[theme]];
        shuffle(selectedQuestions); // Shuffle selected questions
        currentQuestion = 0;
        score = 0; 
        userAnswers = []; 
        // Transition from start screen to question screen
        $('#start-screen').fadeOut(500, function() {
            $('#question-screen').removeClass('d-none').fadeIn(500);
            displayQuestion();
        });
    });

    // Event listener for the next button
    $('#next-btn').click(function() {
        let selectedOption = $('input[name="option"]:checked').val();
        if (selectedOption === undefined) {
            alert("Please select an answer");
            return;
        }

        userAnswers.push(selectedOption);
        if (selectedOption == selectedQuestions[currentQuestion].answer) {
            score++;
        }

        currentQuestion++;
        if (currentQuestion < selectedQuestions.length) {
            // Transition to the next question
            $('#question-screen').fadeOut(500, function() {
                displayQuestion();
                $('#question-screen').fadeIn(500);
            });
        } else {
            displayResults(); // Display results if no more questions
        }
    });

    // Event listener for the back button
    $('#retour-btn').click(function() {
        $('#question-screen').fadeOut(500, function() {
            $('#start-screen').fadeIn(500);
        });
        currentQuestion = 0;
        score = 0;
        userAnswers = [];
    });

    // Event listener for the restart button
    $('#restart-btn').click(function() {
        $('#result-screen').fadeOut(500, function() {
            $('#start-screen').fadeIn(500);
        });
        currentQuestion = 0;
        score = 0;
        userAnswers = [];
    });

    // Function to display the current question
    function displayQuestion() {
        if (currentQuestion >= selectedQuestions.length) {
            displayResults();
            return;
        }
        let q = selectedQuestions[currentQuestion];
        $('#question-number').text(`Question ${currentQuestion + 1} / ${selectedQuestions.length}`);
        $('#question-text').text(q.question);
        $('#options-container').empty();

        // Display image if available
        if (q.image) {
            $('#question-text').append(`<br><img src="${q.image}" class="img-fluid mt-3">`);
        }

        // Display options
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

    // Function to display the results
    function displayResults() {
        $('#question-screen').hide();
        $('#result-screen').removeClass('d-none').fadeIn(500);
        $('#score').text(`Votre score est de ${score} sur ${selectedQuestions.length}`);
        let summaryHtml = '<div class="row">'; 
        selectedQuestions.forEach((q, index) => {
            let isCorrect = userAnswers[index] == q.answer;
            let answerClass = isCorrect ? 'correct' : 'incorrect';
            summaryHtml += `
                <div class="col-6 result-item ${answerClass} mb-3">
                    <p><strong>Question:</strong> ${q.question}</p>
                    ${q.image ? `<img src="${q.image}" class="img-fluid mt-3">` : ''}
                    <p><strong>Votre réponse:</strong> ${q.options[userAnswers[index]]}</p>
                    <p><strong>Réponse correct:</strong> ${q.options[q.answer]}</p>
                </div>
            `;
        });
        summaryHtml += '</div>';
        $('#summary').html(summaryHtml);

        // Scroll to summary
        $('html, body').animate({
            scrollTop: $("#summary").offset().top
        }, 1000);
    }
});
