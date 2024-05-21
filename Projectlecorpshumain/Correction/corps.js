
const tagNames = document.getElementsByClassName("p-texte");
raz();

function raz(){
    for(i = 0; i < tagNames.length; i++) { tagNames[i].style.display= "none";  }
}

document.getElementById("h1").addEventListener("click", function(effacer){ //effacer le texte en cliquant sur le H1
    raz();

}, false);

document.getElementById("area-epaule").addEventListener("click", function(epaule){ //afficher le texte correspondant à l'épaule 

    raz();
    document.getElementById("p-epaule").style.display= "block";

}, false);

document.getElementById("area-main").addEventListener("click", function(main){ //afficher le texte correspondant à la main 

    raz();  
    document.getElementById("p-main").style.display= "block";

}, false);


