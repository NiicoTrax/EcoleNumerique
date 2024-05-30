// Existing event listeners
document.getElementById('calculer').addEventListener('click', calculerBudget);
document.getElementById('reset').addEventListener('click', resetForm);

// Existing select on focus
document.querySelectorAll('input[type="number"]').forEach(input => {
    input.addEventListener('focus', function() {
        this.select();
    });
});

// Budget calculation function
function calculerBudget() {
    // Retrieve values for fixed expenses
    const loyer = parseFloat(document.getElementById('loyer').value) || 0;
    const eau = parseFloat(document.getElementById('eau').value) || 0;
    const telecom = parseFloat(document.getElementById('telecom').value) || 0;
    const vehicule = parseFloat(document.getElementById('vehicule').value) || 0;
    const mutuelle = parseFloat(document.getElementById('mutuelle').value) || 0;

    // Retrieve values for weekly regular and occasional expenses and convert them to monthly
    const weeksInMonth = 4.345;
    const courses = Math.round((parseFloat(document.getElementById('courses').value) || 0) * weeksInMonth);
    const transport = Math.round((parseFloat(document.getElementById('transport').value) || 0) * weeksInMonth);
    const activites = Math.round((parseFloat(document.getElementById('activites').value) || 0) * weeksInMonth);
    const sorties = Math.round((parseFloat(document.getElementById('sorties').value) || 0) * weeksInMonth);
    const autresDepenses = Math.round((parseFloat(document.getElementById('autres-depenses').value) || 0) * weeksInMonth);

    // Retrieve values for income
    const salaire = parseFloat(document.getElementById('salaire').value) || 0;
    const aides = parseFloat(document.getElementById('aides').value) || 0;
    const rentes = parseFloat(document.getElementById('rentes').value) || 0;
    const autresRecettes = parseFloat(document.getElementById('autres-recettes').value) || 0;

    // Retrieve the value of savings
    const epargne = parseFloat(document.getElementById('epargne').value) || 0;

    // Calculate total expenses
    const totalDepenses = loyer + eau + telecom + vehicule + mutuelle + courses + transport + activites + sorties + autresDepenses;
    const totalRecettes = salaire + aides + rentes + autresRecettes;

    // Calculate remaining budget
    const budgetRestant = totalRecettes - totalDepenses + epargne;

    if (budgetRestant > 0) {
        // Generate spending suggestions based on the remaining budget
        let suggestion = '';
        if (budgetRestant < 50) {
            suggestion = 'Vous pourriez envisager de sortir dîner ou acheter un livre.';
        } else if (budgetRestant < 200) {
            suggestion = 'Vous pourriez envisager de faire une petite excursion ou acheter un gadget.';
        } else if (budgetRestant < 500) {
            suggestion = 'Vous pourriez envisager un week-end de vacances ou acheter un nouvel appareil électronique.';
        } else {
            suggestion = 'Vous pourriez envisager un voyage ou faire un investissement plus important.';
        }

        // Alert message
        message.innerHTML = `<div class="alert alert-success"><i class="fas fa-thumbs-up"></i> Votre budget est positif : il vous reste ${budgetRestant}€.<br> ${suggestion}</div>`;
    } else if (budgetRestant < 0) {
        message.innerHTML = `<div class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> Votre budget est négatif de ${budgetRestant}€. Essayez de réduire vos dépenses.</div>`;
    } else {
        message.innerHTML = `<div class="alert alert-warning"><i class="fas fa-exclamation-circle"></i> Votre budget est équilibré : ${budgetRestant}€.</div>`;
    }
}

// Reset all forms
function resetForm() {
    document.getElementById('depenses-fixes-form').reset();
    document.getElementById('depenses-courantes-form').reset();
    document.getElementById('recettes-form').reset();
    document.getElementById('epargne').value = '';
    document.getElementById('message').innerHTML = '';
    document.querySelectorAll('input[type="number"]').forEach(input => {
        input.value = 0;
    });
}

// New event listener for Enter key
document.querySelectorAll('input').forEach(input => {
    input.addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            calculerBudget();
        }
    });
});
