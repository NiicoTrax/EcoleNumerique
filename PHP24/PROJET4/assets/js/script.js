document.addEventListener('DOMContentLoaded', function() {
    var intro = document.getElementById('intro');
    if (intro) {
        intro.style.opacity = 0;
        setTimeout(function() {
            intro.style.transition = 'opacity 2s';
            intro.style.opacity = 1;
        }, 100);
    }
});
