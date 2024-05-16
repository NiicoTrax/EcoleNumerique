document.getElementById('valider').addEventListener('click',
    function () {
        var age = document.getElementById('age').value;

        if(age > 18) {
            alert('Vous êtes majeur')
        } 
        
        else {
            alert('Vous êtes mineur')
        }
    }
)