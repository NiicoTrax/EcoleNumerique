

// l'élément image du chat
let catPic = document.getElementById('cat-pic');

//  fonction de retour
function catMeow() {
    document.getElementById('cat-chat').innerText = 'Miaou';
}

// fonction de retour comme écouteur d'événement
catPic.addEventListener('click', catMeow);










