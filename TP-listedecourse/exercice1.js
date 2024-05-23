// Les articles à afficher dans la liste
var articles = [
    "Orangina",
    "Crême Fraiche",
    "Tartiflette",
    "Emmental",
    "Bananes",
    "Chips",
    "Bières",
    "Pizza"
];

var hiddenArticles = []; // Tableau pour stocker les articles masqués
var draggedItem = null; // Élément en cours de glisser

// Fonction pour ajouter les articles à la liste
function populateList() {
    var ul = document.getElementById("listeCourse"); // Obtenir l'élément UL par son ID
    ul.innerHTML = ""; // Vider le contenu de l'élément UL
    articles.forEach((item, index) => { // Parcourir les articles
        var li = document.createElement("li"); // Créer un élément LI
        li.setAttribute("data-article", item); // Stocker le nom de l'article comme attribut
        li.setAttribute("draggable", "true"); // Rendre l'élément draggable

        // Événements de drag-and-drop
        li.addEventListener("dragstart", function() { // Commence à glisser
            draggedItem = li; // Stocker l'élément glissé
            setTimeout(function() {
                li.classList.add("dragging"); // Ajouter la classe dragging après un court délai
            }, 0);
        });

        li.addEventListener("dragend", function() { // Fin du glisser
            setTimeout(function() {
                li.classList.remove("dragging"); // Retirer la classe dragging après un court délai
                draggedItem = null; // Réinitialiser l'élément glissé
                ul.querySelectorAll('.over').forEach(item => item.classList.remove('over')); // Retirer la classe over de tous les éléments
            }, 0);
        });

        li.addEventListener("dragover", function(e) { // Quand un élément est survolé pendant le glisser
            e.preventDefault(); // Empêcher l'action par défaut
            this.classList.add("over"); // Ajouter la classe over
        });

        li.addEventListener("dragleave", function() { // Quand un élément quitte la zone de survol
            this.classList.remove("over"); // Retirer la classe over
        });

        li.addEventListener("drop", function(e) { // Quand l'élément est déposé
            e.preventDefault(); // Empêcher l'action par défaut
            if (this !== draggedItem) { // Si l'élément déposé n'est pas le même que l'élément glissé
                var allItems = Array.from(ul.children); // Obtenir tous les éléments LI
                var draggedIndex = allItems.indexOf(draggedItem); // Obtenir l'index de l'élément glissé
                var dropIndex = allItems.indexOf(this); // Obtenir l'index de l'élément déposé

                if (draggedIndex > dropIndex) { // Si l'élément glissé est avant l'élément déposé
                    ul.insertBefore(draggedItem, this); // Insérer l'élément glissé avant l'élément déposé
                } else {
                    ul.insertBefore(draggedItem, this.nextSibling); // Insérer l'élément glissé après l'élément déposé
                }

                // Mettre à jour l'ordre des éléments dans le tableau articles
                articles.splice(dropIndex, 0, articles.splice(draggedIndex, 1)[0]); // Repositionner l'élément dans le tableau
                updateArticleDisplay(); // Mettre à jour l'affichage des articles
            }
        });

        // Bouton pour masquer l'élément
        var hideButton = document.createElement("button"); // Créer un bouton
        hideButton.classList.add("hide-btn"); // Ajouter une classe au bouton
        hideButton.title = "Masquer l'article"; // Ajouter une infobulle au bouton
        hideButton.onclick = function() { // Ajouter un événement au clic
            li.style.display = "none"; // Masquer l'élément LI
            hiddenArticles.push(item); // Ajouter l'article à la liste des articles masqués
            updateArticleDisplay(); // Mettre à jour l'affichage des articles
        };

        // Ajout du bouton de masquage à l'élément <li> avant le texte
        li.appendChild(hideButton); // Ajouter le bouton de masquage à l'élément LI
        
        // Création du texte de l'élément
        var textNode = document.createTextNode(item); // Créer un nœud de texte avec le nom de l'article
        li.appendChild(textNode); // Ajouter le nœud de texte à l'élément LI

        // Bouton pour supprimer l'élément
        var deleteButton = document.createElement("button"); // Créer un bouton
        deleteButton.classList.add("delete-btn"); // Ajouter une classe au bouton
        deleteButton.textContent = "Supprimer"; // Ajouter le texte au bouton
        deleteButton.title = "Supprimer l'article"; // Ajouter une infobulle au bouton
        deleteButton.onclick = function() { // Ajouter un événement au clic
            articles.splice(index, 1); // Supprimer l'article du tableau
            populateList(); // Repeupler la liste
            updateArticleDisplay(); // Mettre à jour l'affichage des articles
        };

        // Ajout du bouton de suppression à l'élément <li>
        li.appendChild(deleteButton); // Ajouter le bouton de suppression à l'élément LI

        // Ajout de l'élément <li> à la liste <ul>
        ul.appendChild(li); // Ajouter l'élément LI à l'élément UL
    });
}

// Fonction pour ajouter un nouvel article
function addArticle() {
    var input = document.getElementById("newArticle"); // Obtenir l'élément input par son ID
    var newArticle = input.value; // Obtenir la valeur de l'input
    if (newArticle) { // Si l'input n'est pas vide
        articles.push(newArticle); // Ajouter le nouvel article au tableau
        populateList(); // Repeupler la liste
        updateArticleDisplay(); // Mettre à jour l'affichage des articles
        input.value = ""; // Réinitialiser la valeur de l'input
    }
}

// Fonction pour supprimer le dernier article
function removeLastArticle() {
    articles.pop(); // Supprimer le dernier article du tableau
    populateList(); // Repeupler la liste
    updateArticleDisplay(); // Mettre à jour l'affichage des articles
}

// Fonction pour mettre à jour l'affichage du tableau et ajouter les événements de clic
function updateArticleDisplay() {
    var div = document.getElementById("articleDisplay"); // Obtenir l'élément div par son ID
    div.innerHTML = "<h1>Article dans le tableau :</h1>"; // Vider la div et ajouter un titre

    articles.forEach((item) => { // Parcourir les articles
        var button = document.createElement("button"); // Créer un bouton
        button.textContent = item; // Ajouter le texte au bouton
        button.classList.add("article-button"); // Ajouter une classe au bouton

        // Ajouter une classe cachée si l'article est masqué
        if (hiddenArticles.includes(item)) { // Si l'article est masqué
            button.classList.add("hidden"); // Ajouter la classe hidden
        }

        button.onclick = function() { // Ajouter un événement au clic
            // Masquer ou afficher l'article
            var ul = document.getElementById("listeCourse"); // Obtenir l'élément UL par son ID
            var lis = ul.querySelectorAll("li"); // Obtenir tous les éléments LI
            lis.forEach(li => { // Parcourir les éléments LI
                if (li.getAttribute("data-article") === item) { // Si l'attribut data-article correspond à l'article
                    if (li.style.display === "none") { // Si l'élément LI est masqué
                        li.style.display = "flex"; // Afficher l'élément LI
                        var index = hiddenArticles.indexOf(item); // Obtenir l'index de l'article masqué
                        if (index > -1) {
                            hiddenArticles.splice(index, 1); // Retirer l'article de la liste des articles masqués
                        }
                    } else {
                        li.style.display = "none"; // Masquer l'élément LI
                        hiddenArticles.push(item); // Ajouter l'article à la liste des articles masqués
                    }
                }
            });
            updateArticleDisplay(); // Mettre à jour l'affichage des articles
        };
        div.appendChild(button); // Ajouter le bouton à la div
    });
}

// Initialiser la liste et les éléments d'interface
document.addEventListener("DOMContentLoaded", function() { // Quand le DOM est chargé
    populateList(); // Repeupler la liste
    updateArticleDisplay(); // Mettre à jour l'affichage des articles
});
