
var Tab= [];

document.getElementById("OK").addEventListener("click", function (){

    Tab.push(document.getElementById("input").value);
    console.log(Tab);

    if (Tab.length>=10){
      document.getElementById("Valeur").innerHTML= Tab[Math.round(Math.random()*Tab.length)];
      document.getElementById("Valeur5").innerHTML= Tab[4];

    }

    if (Tab.length<10){
        document.getElementById("Valeur").innerHTML= "entrez au moins 10 valeurs"
    }
});


document.getElementById("afficheRandom").addEventListener("click", function (){
        document.getElementById("random").innerHTML= Tab[Math.round(Math.random()*Tab.length)];

});

document.getElementById("allTab").addEventListener("click", function (){

    for (var i=0; i<Tab.length; i++) {
        document.getElementById("all").innerHTML += i+ "-" + Tab[i] + "_";
    }
});


document.getElementById("supprEntree").addEventListener("click", function (){
    Tab.pop();
    document.getElementById("supE").innerHTML= Tab;

});

document.getElementById("supprTab").addEventListener("click", function (){
    Tab= [];
    console.log(Tab)
    document.getElementById("supT").innerHTML= "Tableau vide" + Tab;
});
