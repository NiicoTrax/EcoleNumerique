let deaths = 0;

document.getElementById('up').addEventListener('click', function() {
    moveKenny('up');
});

document.getElementById('down').addEventListener('click', function() {
    moveKenny('down');
});

document.getElementById('left').addEventListener('click', function() {
    moveKenny('left');
});

document.getElementById('right').addEventListener('click', function() {
    moveKenny('right');
});

document.addEventListener('keydown', function(event) {
    if (event.key === 'ArrowUp') {
        moveKenny('up');
    } else if (event.key === 'ArrowDown') {
        moveKenny('down');
    } else if (event.key === 'ArrowLeft') {
        moveKenny('left');
    } else if (event.key === 'ArrowRight') {
        moveKenny('right');
    }
});

function moveKenny(direction) {
    const kenny = document.getElementById('kenny');
    const viewport = document.getElementById('viewport');

    let t = parseInt(kenny.style.top);
    let l = parseInt(kenny.style.left);

    switch (direction) {
        case 'up':
            t = Math.max(t - 10, 0);
            break;
        case 'down':
            t = Math.min(t + 10, viewport.clientHeight - kenny.clientHeight);
            break;
        case 'left':
            l = Math.max(l - 10, 0);
            break;
        case 'right':
            l = Math.min(l + 10, viewport.clientWidth - kenny.clientWidth);
            break;
    }

    kenny.style.top = t + 'px';
    kenny.style.left = l + 'px';

    checkCollision();
}

function checkCollision() {
    const kenny = document.getElementById('kenny');
    const redZone = document.getElementById('redZone');

    const kennyRect = kenny.getBoundingClientRect();
    const redZoneRect = redZone.getBoundingClientRect();

    if (
        kennyRect.left < redZoneRect.right &&
        kennyRect.right > redZoneRect.left &&
        kennyRect.top < redZoneRect.bottom &&
        kennyRect.bottom > redZoneRect.top
    ) {
        deaths += 1;
        alert(`Kenny est mort.\nNombre de morts: ${deaths}`);
        kenny.style.top = '200px';
        kenny.style.left = '200px';
    }
}

// RESET DE KENNY 
document.getElementById('kenny').style.top = '200px';
document.getElementById('kenny').style.left = '200px';

// AJOUT DE LA ZONE ROUGE
const redZone = document.createElement('div');
redZone.id = 'redZone';
redZone.style.position = 'absolute';
redZone.style.top = '0';
redZone.style.left = '0';
redZone.style.width = '50px';
redZone.style.height = '50px';
redZone.style.backgroundColor = 'red';
document.getElementById('viewport').appendChild(redZone);
