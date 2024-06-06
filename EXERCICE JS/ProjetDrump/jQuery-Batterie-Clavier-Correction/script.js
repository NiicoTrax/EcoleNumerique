var audio = $('audio');

$(document).keydown(function(touche){

    var appui = touche.which || touche.keyCode;

    if(appui === 65){
        audio[0].play();
    }
    if(appui === 83){
        audio[1].play();
    }
    if(appui === 68){
        audio[2].play();
    }
    if(appui === 70){
        audio[3].play();
    }
    if(appui === 71){
        audio[4].play();
    }
    if(appui === 72){
        audio[5].play();
    }
    if(appui === 74){
        audio[6].play();
    }
    if(appui === 75){
        audio[7].play();
    }
    if(appui === 76){
        audio[8].play();
    }
});
