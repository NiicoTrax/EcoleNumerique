

var viewport = document.getElementById('viewport'), 
    zone_rouge = document.createElement('div'),//créer une zone rouge
    death_counter = 0;

zone_rouge.style.height = '50px';
zone_rouge.style.width = '50px';
zone_rouge.style.backgroundColor = 'red';

viewport.append(zone_rouge);

function resetKenny() { //fonction de réinitialisation du jeu quand le joueur perd : position de Kenny
    document.getElementById('kenny').style.top = '200px';
    document.getElementById('kenny').style.left = '200px';
}

function checkForDeath() { //fonction entrée dans la zone rouge
    var top = parseInt(document.getElementById('kenny').style.top),
        left = parseInt(document.getElementById('kenny').style.left);

    if (top < 40 && left < 40) { 
        death_counter++;//incrémentation du nombre de fois où le joueur a perdu
        alert('You are dead!\nDeath Counter: ' + death_counter); //alerte
        resetKenny(); //réinitialisation de la position de Kenny 
        return true;
    }
    return false;
}

function moveLeft() { //mouvement vers gauche 
    var t = parseInt(document.getElementById('kenny').style.left);
    t -= 10;

    if (checkForDeath()) {
        return;
    }

    if (t < 0) {
        return;
    }
    document.getElementById('kenny').style.left = t + 'px';
}

function moveUp() { //mouvement haut 
    var t = parseInt(document.getElementById('kenny').style.top);
    t -= 10;

    if (checkForDeath()) {
        return;
    }

    if (t < 0) {
        return;
    }
    document.getElementById('kenny').style.top = t+'px';
}

function moveRight() { //mouvement droit
    var t = parseInt(document.getElementById('kenny').style.left);
    t += 10;
    if (t > 470) {
        return;
    }
    document.getElementById('kenny').style.left = t + 'px';
}

function moveDown() { //mouvement bas
    var t = parseInt(document.getElementById('kenny').style.top);
    t += 10;
    if (t > 470) {
        return;
    }
    document.getElementById('kenny').style.top = t+'px';
}

document.addEventListener('keydown', function(e) { // déplacement avec le clavier
    switch (e.which) {
        case 37:
            moveLeft();
            break;
        case 38:
            moveUp();
            break;
        case 39:
            moveRight();
            break;
        case 40:
            moveDown();
            break;
        default:
            e.preventDefault();
    }

});

document.getElementById('up').addEventListener('click',function() { //fonction au clic
    var t = parseInt(document.getElementById('kenny').style.top);
    t -= 10;

    if (checkForDeath()) {
        return;
    }

    if (t < 0) {
        return;
    }
    document.getElementById('kenny').style.top = t+'px';
});

document.getElementById('down').addEventListener('click',function() {  //fonction au clic
    var t = parseInt(document.getElementById('kenny').style.top);
    t += 10;
    if (t > 470) {
        return;
    }
    document.getElementById('kenny').style.top = t+'px';
});

document.getElementById('left').addEventListener('click',function() {  //fonction au clic
    var t = parseInt(document.getElementById('kenny').style.left);
    t -= 10;

    if (checkForDeath()) {
        return;
    }

    if (t < 0) {
        return;
    }
    document.getElementById('kenny').style.left = t + 'px';
});

document.getElementById('right').addEventListener('click',function() {  //fonction au clic
    var t = parseInt(document.getElementById('kenny').style.left);
    t += 10;
    if (t > 470) {
        return;
    }
    document.getElementById('kenny').style.left = t + 'px';
});