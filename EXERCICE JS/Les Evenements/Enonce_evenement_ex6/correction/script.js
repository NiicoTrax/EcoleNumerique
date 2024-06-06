document.getElementById('valider').addEventListener('click',
    function () {
        var number1 = Math.round(document.getElementById('premier_nombre').value);
        var number2 = Math.round(document.getElementById('deuxieme_nombre').value);

        var number3 = Math.round(document.getElementById('troisieme_nombre').value);
        var number4 = Math.round(document.getElementById('quatrieme_nombre').value);

        var calcul1 = number1 * number2;
        var calcul2 = number3 / number4;

        var result = calcul1 + calcul2


        alert('Resultat : ' + result)
    }
)