document.getElementById('valider').addEventListener('click',
    function () {
        var Valeur1 = Math.round(document.getElementById('premier_nombre').value);
        var Valeur2 = Math.round(document.getElementById('deuxieme_nombre').value);

        var result = Valeur1 * Valeur2;

        alert('Resultat : ' + result)
    }
)