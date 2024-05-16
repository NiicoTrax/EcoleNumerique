document.getElementById('valider').addEventListener('click',
    function () {
        var pointure = document.getElementById('pointure').value;
        var year = document.getElementById('annee').value;

        var calcul1 = pointure * 2;
        console.log(calcul1)
        var calcul2 = calcul1 + 5;
        console.log(calcul2)
        var calcul3 = calcul2 * 50;
        console.log(calcul3)
        var calcul4 = calcul3 - year;
        console.log(calcul4)

        var result = calcul4 + 1776;

        alert("Total : " + result)
    }
)