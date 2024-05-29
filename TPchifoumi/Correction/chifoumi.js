
var choixUtilisateur= 0;

score= 0;
scoreA=0;

var tabUser= [];
var tabOrdi= [];


document.getElementById("reset").addEventListener("click", function () {
    document.getElementById("ChoixF").innerHTML='';
    document.getElementById("ChoixG").innerHTML='';

    
});

document.getElementById("feuille").addEventListener("click", function () {
    choixUtilisateur= 1;
    var choixOrdinateur = (Math.random()*3)+1;
    choixOrdinateur= Math.floor(choixOrdinateur);

    var monImage = document.createElement('img');
    monImage.src = "./assets/img/Rock-paper-scissors_(paper).png";
    document.getElementById("ChoixF").appendChild(monImage);
   

    if (choixOrdinateur==1){
        //document.getElementById("ChoixG").innerHTML= "l'ordinateur a choisi feuille";
        var monImage = document.createElement('img');
        monImage.src = "./assets/img/Rock-paper-scissors_(paper).png"; 
        document.getElementById("ChoixG").appendChild(monImage);
        document.getElementById('response').innerHTML="Match Nul!" ;
    }
    if (choixOrdinateur==2){
        //document.getElementById("ChoixG").innerHTML= "l'ordinateur a choisi pierre";
        var monImage = document.createElement('img');
        monImage.src = "./assets/img/Rock-paper-scissors_(rock).png";;
        document.getElementById("ChoixG").appendChild(monImage);
        document.getElementById('response').innerHTML="You win!" ;
        scoreU ();
    }
    if (choixOrdinateur==3){
        //document.getElementById("ChoixG").innerHTML= "l'ordinateur a choisi ciseaux";
        var monImage = document.createElement('img');
        monImage.src = "./assets/img/Rock-paper-scissors_(scissors).png";;
        document.getElementById("ChoixG").appendChild(monImage);
        document.getElementById('response').innerHTML="You loose!" ;
        scoreOrdi();
    }
});


document.getElementById("pierre").addEventListener("click", function () {
   choixUtilisateur= 2;
   var choixOrdinateur = (Math.random()*3)+1;
   choixOrdinateur= Math.floor(choixOrdinateur);
  // document.getElementById("ChoixF").innerHTML= "Vous avez choisi pierre";
    var monImage = document.createElement('img');
    monImage.src = "./assets/img/Rock-paper-scissors_(rock).png";
    document.getElementById("ChoixF").appendChild(monImage);


 if (choixOrdinateur==1){
       //document.getElementById("ChoixG").innerHTML= "l'ordinateur a choisi feuille";
        var monImage = document.createElement('img');
        monImage.src = "./assets/img/Rock-paper-scissors_(paper).png"; 
        document.getElementById("ChoixG").appendChild(monImage);
        document.getElementById('response').innerHTML="You Loose!" ;
        scoreOrdi();
   }
   if (choixOrdinateur==2){
       //document.getElementById("ChoixG").innerHTML= "l'ordinateur a choisi pierre";
       var monImage = document.createElement('img');
        monImage.src = "./assets/img/Rock-paper-scissors_(rock).png";
        document.getElementById("ChoixG").appendChild(monImage);
        document.getElementById('response').innerHTML="Match Nul!" ;
   }
   if (choixOrdinateur==3){
       //document.getElementById("ChoixG").innerHTML= "l'ordinateur a choisi ciseaux";
       var monImage = document.createElement('img');
       monImage.src = "./assets/img/Rock-paper-scissors_(scissors).png";
       document.getElementById("ChoixG").appendChild(monImage);
       document.getElementById('response').innerHTML="You Win!" ;
       scoreU ();
    }
});

document.getElementById("ciseaux").addEventListener("click", function () {
    choixUtilisateur= 3;
    var choixOrdinateur = (Math.random()*3)+1;
    choixOrdinateur= Math.floor(choixOrdinateur);
    //document.getElementById("ChoixF").innerHTML= "Vous avez choisi ciseaux";

    var monImage = document.createElement('img');
       monImage.src = "./assets/img/Rock-paper-scissors_(scissors).png";
       document.getElementById("ChoixF").appendChild(monImage);

    if (choixOrdinateur==1){
        //document.getElementById("ChoixG").innerHTML= "l'ordinateur a choisi feuille";
        var monImage = document.createElement('img');
        monImage.src = "./assets/img/Rock-paper-scissors_(paper).png"; 
        document.getElementById("ChoixG").appendChild(monImage);
        document.getElementById('response').innerHTML="You Win!" ;  
        scoreU ();
    }
    if (choixOrdinateur==2){
        //document.getElementById("ChoixG").innerHTML= "l'ordinateur a choisi pierre";
        var monImage = document.createElement('img');
        monImage.src = "./assets/img/Rock-paper-scissors_(rock).png";
        document.getElementById("ChoixG").appendChild(monImage);
        document.getElementById('response').innerHTML="You Loose!" ;
        scoreOrdi ();
    }
    if (choixOrdinateur==3) {
        //document.getElementById("ChoixG").innerHTML = "l'ordinateur a choisi ciseaux";
        var monImage = document.createElement('img');
       monImage.src = "./assets/img/Rock-paper-scissors_(scissors).png";
       document.getElementById("ChoixG").appendChild(monImage);
       document.getElementById('response').innerHTML="Match Nul!" ;
    }
});

function scoreU () {
    score++;
    document.getElementById("scoreUtilisateur").innerHTML= "Vous avez" +" "+ score + " "+ "points";
}

function scoreOrdi () {
    scoreA++;
    document.getElementById("scoreOrdinateur").innerHTML= "Votre adversaire a"+ " " + scoreA + " "+ "points";
}

