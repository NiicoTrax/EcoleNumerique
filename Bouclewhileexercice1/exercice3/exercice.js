
var libButton = document.getElementById('lib-button');

var libIt = function() {
    var noun = document.getElementById('noun').value;
    var adjective = document.getElementById('adjective').value;
    var person = document.getElementById('person').value;

    var story = `Un jour, ${person} se promenait dans le parc et a vu un ${adjective} ${noun}. C'était un spectacle inoubliable !`;

    var storyDiv = document.getElementById("story");
    storyDiv.innerHTML = story;
};

libButton.addEventListener('click', libIt);
