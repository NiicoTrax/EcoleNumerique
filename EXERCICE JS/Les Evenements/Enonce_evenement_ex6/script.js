document.getElementById('valider').addEventListener('click',
    function () {
        var Valeur1 = Math.round(document.getElementById('premier_nombre').value);
        var Valeur2 = Math.round(document.getElementById('deuxieme_nombre').value);
        var Valeur3 = Math.round(document.getElementById('troisieme_nombre').value);
        var Valeur4 = Math.round(document.getElementById('quatrieme_nombre').value);

        var result = Valeur1 * Valeur2;
        var result2 = Valeur3 / Valeur4;


        alert(result + result2);
    }
)
