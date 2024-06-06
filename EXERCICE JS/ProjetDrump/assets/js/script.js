$(document).ready(function() {
    // Append audio elements to the body
    $('body').append(`
        <audio data-key="65" src="assets/sounds/baterrie.mp3"></audio>
        <audio data-key="83" src="assets/sounds/Guitare.wav"></audio>
        <audio data-key="68" src="assets/sounds/piano.wav"></audio>
        <audio data-key="90" src="assets/sounds/flute.wav"></audio>
        <audio data-key="88" src="assets/sounds/boiteamusique.wav"></audio>
    `);

    // Event listener for keydown events
    $(window).on('keydown', function(e) {
        // Get the audio element and the corresponding key element based on the key code
        const audio = $(`audio[data-key="${e.keyCode}"]`)[0];
        const key = $(`div[data-key="${e.keyCode}"]`);

        // If there's no audio element for the pressed key, exit the function
        if (!audio) return;

        // Rewind the audio to the start and play it
        audio.currentTime = 0;
        audio.play();
        // Add the 'playing' class to the key element to apply the visual effects
        key.addClass('playing');
    });

    // Event listener for the end of CSS transitions
    $('.key').on('transitionend', function(e) {
        // Only remove the 'playing' class if the transition is for the 'transform' property
        if (e.originalEvent.propertyName !== 'transform') return;
        $(this).removeClass('playing');
    });

    // Event listener for the end of the audio playback
    $('audio').on('ended', function() {
        // Remove the 'playing' class from the corresponding key element
        const key = $(`div[data-key="${$(this).data('key')}"]`);
        key.removeClass('playing');
    });
});
