// JS for index.php
document.querySelectorAll('a').forEach(link => {
    link.addEventListener('mouseover', function() {
        this.style.transform = 'scale(1.02)';
    });
    link.addEventListener('mouseout', function() {
        this.style.transform = 'scale(1)';
    });
});

// General JS for animations on load
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('h1, ul, .back-link').forEach(element => {
        element.style.opacity = 0;
        element.style.transition = 'opacity 1s';
        setTimeout(() => {
            element.style.opacity = 1;
        }, 200);
    });
});
