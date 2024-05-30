// Variable pour les Input "Depenses"
let Loyer = document.getElementById("Loyer");
let Credit = document.getElementById("Credit");
let Eau = document.getElementById("Eau");
let Electricite = document.getElementById("Electricite");
let Gaz = document.getElementById("Gaz");
let Internet = document.getElementById("Internet");
let Habitation = document.getElementById("Habitation");
let Auto = document.getElementById("Vehicules");
let Sante = document.getElementById("Sante");
let Garde = document.getElementById("Garde");
let IRevenu = document.getElementById("IRevenu");
let ILocaux = document.getElementById("ILocaux");
let Courses = document.getElementById("Courses");
let Essences = document.getElementById("Essence");
let Activite = document.getElementById("Activites");
let Transport = document.getElementById("Transport");
let Sortie = document.getElementById("Sortie");

// Variable pour les Input pour rajouter des "Depenses" selon le choix de l'utilisateur
let AjoutDNom = document.getElementById("AjoutDNom");
let AjoutDNombre = document.getElementById("AjoutDNombre");

// Variable pour les Input pour rajouter des "Recettes" selon le choix de l'utilisateur
let AjoutRNom = document.getElementById("AjoutRNom");
let AjoutRNombre = document.getElementById("AjoutRNombre");

// Variable pour l'Input "Epargne"
let Epargne = document.getElementById("Eparg");

// Variable pour les Input "Recettes"
let Salaire = document.getElementById("Salaire");
let Aide = document.getElementById("Aide");
let Rentes = document.getElementById("Rentes");

document.getElementById("Valider").addEventListener("click",

    function () {

        // Variable pour récuperer la valeur des "Recettes"
        let ValeurRNom = AjoutRNom.value;
        let ValeurR = AjoutRNombre;
        let ValeurRNombre = AjoutRNombre.value;
        document.getElementById("R").innerHTML = ValeurRNom + " : " + ValeurRNombre + "€";

        // Variable pour récuperer la valeur des "Depenses"
        let ValeurDNom = AjoutDNom.value;
        let ValeurD = AjoutDNombre;
        let ValeurDNombre = AjoutDNombre.value;
        document.getElementById("D").innerHTML = ValeurDNom + " : " + ValeurDNombre + "€";

        // Variable qui va regrouper et additionner la valeur de toute les dépenses
        let Depenses = Number(Loyer.value) + Number(Credit.value) + Number(Eau.value)
            + Number(Electricite.value) + Number(Gaz.value) + Number(Internet.value)
            + Number(Habitation.value) + Number(Auto.value) + Number(Sante.value)
            + Number(Garde.value) + Number(IRevenu.value) + Number(ILocaux.value)
            + Number(Courses.value) + Number(Essences.value) + Number(Activite.value)
            + Number(Transport.value) + Number(Sortie.value) + Number(ValeurD.value);

        // Variable qui va arrondir la variable "Depenses" a deux chiffres après la virgule
        let TotalDepenses = Math.round(Depenses * 100) / 100;

        //Variable qui va recuperer la valeur de Epargne
        let Eparg = Number(Epargne.value);

        // Variable qui va arrondir la variable "Epargne" a deux chiffres après la virgule
        let TotalEpargne = Math.round(Eparg * 100) / 100;

        // Variable qui va recuperer et additionner la valeur des recettes
        let Recettes = Number(Salaire.value) + Number(Aide.value) + Number(Rentes.value) + Number(ValeurR.value);

        // Variable qui va arrondir la variable "Recettes" a deux chiffres après la virgule
        let TotalRecettes = Math.round(Recettes * 100) / 100;

        // Variable qui va additionner toute les autres variables pour faire le total
        let Total = Number(TotalRecettes) - Number(TotalEpargne) - Number(TotalDepenses);

        // Variable qui va arrondir la variable "Total" a deux chiffres après la virgule
        let Totaux = Math.round(Total * 100) / 100;
        document.getElementById("Somme").innerHTML = Totaux;

        if (Totaux > 0) {
            document.getElementById("Budget").innerHTML = "Vous avez un budget positif";
            document.getElementById("BudgetPositif").innerHTML = "Vous pouvez acheter des cadeaux, faire plaisir à vos " +
                "proches";
        }

        if (Totaux == 0) {
            document.getElementById("Budget").innerHTML = "Vous avez un budget nul";
        }

        if (Totaux < 0) {
            document.getElementById("Budget").innerHTML = "Vous avez un budget négatif";
        }

        // Permet de verifier la valeur des 3 variables numériques
        console.log(TotalRecettes);
        console.log(TotalEpargne);
        console.log(TotalDepenses);
        console.log(Totaux);
    });

document.getElementById("Reset").addEventListener("click",

    function () {

        Loyer.value = "0";
        Credit.value = "0";
        Eau.value = "0";
        Electricite.value = "0";
        Gaz.value = "0";
        Internet.value = "0";
        Habitation.value = "0";
        Auto.value = "0";
        Sante.value = "0";
        Garde.value = "0";
        IRevenu.value = "0";
        ILocaux.value = "0";
        Courses.value = "0";
        Essences.value = "0";
        Activite.value = "0";
        Aide.value = "0";
        Transport.value = "0";
        Sortie.value = "0";
        Epargne.value = "0";
        Rentes.value = "0";
        Salaire.value = "0";
        AjoutDNom.value = "";
        AjoutRNom.value = "";
        AjoutRNombre.value = "0";
        AjoutDNombre.value = "0";
        document.getElementById("Somme").innerHTML = "00.00";
        document.getElementById("Budget").innerHTML = "Vous avez un budget : ";
        document.getElementById("R").innerHTML = "";
        document.getElementById("D").innerHTML = "";
        document.getElementById("BudgetPositif").innerHTML = "";
    });