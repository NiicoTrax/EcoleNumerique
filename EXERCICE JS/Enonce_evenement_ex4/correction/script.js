document.getElementById('valider').addEventListener('click',

    function () {
        var nom = document.getElementById('nom').value;
        var prenom = document.getElementById('prenom').value;
        var ville = document.getElementById('ville').value;

        alert('Nom : ' + nom + '\nPrenom : ' + prenom + '\nVille : ' + ville + '\n')
    })