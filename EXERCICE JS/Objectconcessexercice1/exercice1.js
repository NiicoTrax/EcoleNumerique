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

document.getElementById('voitureImage').src = voiture.imgUrl;
document.getElementById('nom').innerText = "Nom : " + voiture.Nom;
document.getElementById('nombresRoues').innerText = "Nombre de roues : " + voiture.nombresRoues;
document.getElementById('couleur').innerText = "Couleur : " + voiture.Couleur;
document.getElementById('constructeur').innerText = "Constructeur : " + voiture.Contructeur;
document.getElementById('carburant').innerText = "Carburant : " + voiture.Carburant;
document.getElementById('nombrePortes').innerText = "Nombre de portes : " + voiture.nombrePortes;
document.getElementById('autonomie').innerText = "Autonomie : " + voiture.Autonomie;
document.getElementById('vitesseMaxi').innerText = "Vitesse maximale : " + voiture.vitesseMaxi;
