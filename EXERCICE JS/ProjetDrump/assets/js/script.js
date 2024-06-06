$(document).ready(function() {
    $(window).on('keydown', function(e) {
        const audio = $(`audio[data-key="${e.keyCode}"]`)[0];
        const key = $(`div[data-key="${e.keyCode}"]`);

        if (!audio) return;

        audio.currentTime = 0; // Rewind to the start
        audio.play();
        key.addClass('playing');
    });

    $('.key').on('transitionend', function(e) {
        if (e.originalEvent.propertyName !== 'transform') return;
        $(this).removeClass('playing');
    });
});
