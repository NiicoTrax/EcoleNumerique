document.getElementById('valider').addEventListener('click',
    function () {
        var number1 = Math.round(document.getElementById('premier_nombre').value);
        var number2 = Math.round(document.getElementById('deuxieme_nombre').value);

        var result = number1 * number2;

        alert('Resultat : ' + result)
    }
)