document.getElementById("random").innerHTML= '<img id="image" src="'+"visuels2/recycle.png"+'" />';

score = 0;
essais= 10;

function obj (Dechet, couleur, poubelle){
    this.Dechet= Dechet;
    this.couleur= couleur;
    this.poubelle= poubelle;
    }

var Tab = [];
Tab.push(new obj("visuels2/rouleau_carton(B).jpg","bleu","visuels/bleu.png"));
Tab.push(new obj("visuels2/bouteille_plastique(J).jpg", "jaune", "visuels/jaune.png"));
Tab.push(new obj("visuels2/bouteille_verre(V).jpg", "vert","visuels/vert.png"));
Tab.push(new obj("visuels2/brique_lait(J).jpg", "jaune", "visuels/jaune.png"));
Tab.push(new obj("visuels2/conserve(J).jpg", "jaune", "visuels/jaune.png"));
Tab.push(new obj("visuels2/deo(J).jpg", "jaune", "visuels/jaune.png"));
Tab.push(new obj("visuels2/organiques(M).jpg", "marron", "visuels/marron.png"));
Tab.push(new obj("visuels2/journaux(B).jpg", "bleu","visuels/bleu.png"));
Tab.push(new obj("visuels2/pot_confiture(V).jpg", "vert","visuels/vert.png"));
Tab.push(new obj("visuels2/pot_plastique(M).jpg", "marron","visuels/marron.png"));
console.log(Tab);


var random = Math.round(Math.random() * 9);
console.log(random);



//PLAY
document.getElementById("play").addEventListener("click", function (){
    random = Math.round(Math.random() * 9);
    document.getElementById("random").innerHTML='<img id="image" src="'+Tab[random].Dechet+'" />' ;

    document.getElementById("tableauU").innerHTML +=  '<img id="image2" src="'+Tab[random].Dechet+'" />';

    document.getElementById("play").disabled= true;

});

//NEXT
document.getElementById("next").addEventListener("click", function(){
    essais--;
    random = Math.round(Math.random() * 9);

    document.getElementById("random").innerHTML= '<img id="image" src="'+Tab[random].Dechet+'" />';
    document.getElementById("tableauU").innerHTML +=  '<img id="image2" src="'+Tab[random].Dechet+'" />';


    document.getElementById("jaune").disabled= false;
    document.getElementById("bleu").disabled= false;
    document.getElementById("marron").disabled= false;
    document.getElementById("vert").disabled= false;
});

//RESET
document.getElementById("reset").addEventListener("click", function (){
    document.getElementById("random").innerHTML= '<img id="image" src="'+"visuels2/recycle.png"+'" />';
    document.getElementById("icone").innerHTML= "";
    document.getElementById("tableauU").innerHTML= "";
    document.getElementById("play").disabled= false;
    document.getElementById("visuelOK").innerHTML= "";

    score = 0;
    document.getElementById("points").innerHTML = "Vous avez " + score + " points";
});



//EVENTS POUBELLES

document.getElementById("jaune").addEventListener("click", function(){

    if (Tab[random].couleur=="jaune"){
        good();
        result();
    }

    else{
        wrong();
    }

});

document.getElementById("bleu").addEventListener("click", function(){


    if (Tab[random].couleur=="bleu"){
        good ();
        result();
    }

    else{
        wrong();

    }
});

document.getElementById("vert").addEventListener("click", function(){

    if (Tab[random].couleur=="vert"){
        good ();
        result();
    }

    else{
        wrong();
    }
});

document.getElementById("marron").addEventListener("click", function(){

    if (Tab[random].couleur=="marron"){
        good ();
        result();
    }

    else{
       wrong();
    }
});


//CONSEQUENCES EVENTS
function good (){
    document.getElementById("icone").innerHTML+= '<img id="icon" src="'+"visuels/right.png"+'" />';
    document.getElementById("visuelOK").innerHTML+= '<img id="image3" src="'+Tab[random].poubelle+'" />';

    document.getElementById("jaune").disabled= true;
    document.getElementById("bleu").disabled= true;
    document.getElementById("marron").disabled= true;
    document.getElementById("vert").disabled= true;


}

function wrong (){
    document.getElementById("icone").innerHTML+= '<img id="icon" src="'+"visuels/wrong.png"+'" />';
    document.getElementById("visuelOK").innerHTML+= '<img id="image3" src="'+Tab[random].poubelle+'" />';

    document.getElementById("jaune").disabled= true;
    document.getElementById("bleu").disabled= true;
    document.getElementById("marron").disabled= true;
    document.getElementById("vert").disabled= true;
}


//RESULTATS

function result (){

    if (score<10){

    score++;
    document.getElementById("points").innerHTML = "Vous avez " + score + " points";

    }

    else {
    alert('you win!'); 
    }

}













