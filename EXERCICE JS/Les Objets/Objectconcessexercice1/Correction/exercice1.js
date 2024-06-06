

var voiture = {
    "Nom" : "Eggo",
    "imgUrl" : "https://fr.ubergizmo.com/wp-content/uploads/2011/10/eggo_01.jpg",
    "nombresRoues" : 4,
    "Couleur" : "Marron",
    "Contructeur" : "Citroen",
    "Carburant" : "Solaire",
    "nombrePortes" : 3,
    "Autonomie" : "450km",
    "vitesseMaxi" : "120km/h"
};


document.getElementById("img").style.backgroundImage= "url(" + voiture.imgUrl+ ")";

document.getElementById("legendeImg").innerHTML= voiture.Contructeur + " présente l' " + voiture.Nom;

document.getElementById("txtDescriptif").innerHTML= "Avec une autonomie de " + voiture.Autonomie + " notre voiture du futur fonctionne <br/> à l'énergie "+ voiture.Carburant + " et peut atteindre une vitesse de " + voiture.vitesseMaxi + " ! ";

document.getElementById("infoCompl").innerHTML= " Economique et Ecologique, notre nouvelle voiture aux idées novatrices présente un design exceptionnel.<br/> Dotée de " + voiture.nombresRoues+ " roues et de " + voiture.nombrePortes+ " portes, disponible en " + voiture.Couleur + " elle vous apportera confort et sécurité en toutes circonstances !"

