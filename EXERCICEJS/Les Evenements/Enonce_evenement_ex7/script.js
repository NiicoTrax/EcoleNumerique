document.getElementById('valider').addEventListener('click',
    function () {
        var number1 = Math.round(document.getElementById('pointure').value);
        var number2 = Math.round(document.getElementById('annee').value);

        var calcul1 = number1 * 2
        var calcul2 = calcul1 + 5 ;
        var calcul3 = calcul2 * 50 ;
        var calcul4 = calcul3 - number2 ;
        var result = calcul4 - 1766 ;


        alert('Resultat : ' + result)
    }
)