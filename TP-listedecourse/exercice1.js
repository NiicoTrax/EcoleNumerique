// Les Articles 
var articles = [
    "Orangina",
    "Creme Fraiche",
    "Tartiflette",
    "Emmental",
    "Bananes",
    "Chips",
    "Bieres",
    "Pizza"
];

var hiddenArticles = []; // Tableau pour stocker les articles masqués
var draggedItem = null; // Élement en cours de glisser

// Votre code à partir d'ici :

// Fonction pour ajouter les articles à la liste
function populateList() {
    var ul = document.getElementById("listeCourse");
    ul.innerHTML = ""; 
    articles.forEach((item, index) => {
        var li = document.createElement("li");
        li.setAttribute("data-article", item); // Stocker le nom de l'article comme attribut
        li.setAttribute("draggable", "true"); // Rendre l'élément draggable

        // Événements de drag-and-drop
        li.addEventListener("dragstart", function() {
            draggedItem = li;
            setTimeout(function() {
                li.classList.add("dragging");
            }, 0);
        });

        li.addEventListener("dragend", function() {
            setTimeout(function() {
                li.classList.remove("dragging");
                draggedItem = null;
                ul.querySelectorAll('.over').forEach(item => item.classList.remove('over'));
            }, 0);
        });

        li.addEventListener("dragover", function(e) {
            e.preventDefault();
            this.classList.add("over");
        });

        li.addEventListener("dragleave", function() {
            this.classList.remove("over");
        });

        li.addEventListener("drop", function(e) {
            e.preventDefault();
            if (this !== draggedItem) {
                var allItems = Array.from(ul.children);
                var draggedIndex = allItems.indexOf(draggedItem);
                var dropIndex = allItems.indexOf(this);

                if (draggedIndex > dropIndex) {
                    ul.insertBefore(draggedItem, this);
                } else {
                    ul.insertBefore(draggedItem, this.nextSibling);
                }

                // Mettre à jour l'ordre des éléments dans le tableau articles
                articles.splice(dropIndex, 0, articles.splice(draggedIndex, 1)[0]);
                updateArticleDisplay();
            }
        });

        // Bouton pour masquer l'élément
        var hideButton = document.createElement("button");
        hideButton.classList.add("hide-btn");
        hideButton.title = "Masquer l'article"; // Infobulle
        hideButton.onclick = function() {
            li.style.display = "none";
            hiddenArticles.push(item); // Ajouter à la liste des articles masqués
            updateArticleDisplay();
        };

        // Ajout du bouton de masquage à l'élément <li> avant le texte
        li.appendChild(hideButton);
        
        // Création du texte de l'élément
        var textNode = document.createTextNode(item);
        li.appendChild(textNode);

        // Bouton pour supprimer l'élément
        var deleteButton = document.createElement("button");
        deleteButton.classList.add("delete-btn");
        deleteButton.textContent = "Supprimer";
        deleteButton.title = "Supprimer l'article"; // Infobulle
        deleteButton.onclick = function() {
            articles.splice(index, 1);
            populateList();
            updateArticleDisplay();
        };

        // Ajout du bouton de suppression à l'élément <li>
        li.appendChild(deleteButton);

        // Ajout de l'élément <li> à la liste <ul>
        ul.appendChild(li);
    });
}

// Fonction pour ajouter un nouvel article
function addArticle() {
    var input = document.getElementById("newArticle");
    var newArticle = input.value;
    if (newArticle) {
        articles.push(newArticle);
        populateList();
        updateArticleDisplay();
        input.value = "";
    }
}

// Fonction pour supprimer le dernier article
function removeLastArticle() {
    articles.pop();
    populateList();
    updateArticleDisplay();
}

// Fonction pour mettre à jour l'affichage du tableau et ajouter les événements de clic
function updateArticleDisplay() {
    var div = document.getElementById("articleDisplay");
    div.innerHTML = "<h1>Article dans le tableau :</h1>"; 

    articles.forEach((item) => {
        var button = document.createElement("button");
        button.textContent = item;
        button.classList.add("article-button");

        // Ajouter une classe cachée si l'article est masqué
        if (hiddenArticles.includes(item)) {
            button.classList.add("hidden");
        }

        button.onclick = function() {
            // Masquer ou afficher l'article
            var ul = document.getElementById("listeCourse");
            var lis = ul.querySelectorAll("li");
            lis.forEach(li => {
                if (li.getAttribute("data-article") === item) {
                    if (li.style.display === "none") {
                        li.style.display = "flex";
                        var index = hiddenArticles.indexOf(item);
                        if (index > -1) {
                            hiddenArticles.splice(index, 1); // Retirer de la liste des articles masqués
                        }
                    } else {
                        li.style.display = "none";
                        hiddenArticles.push(item); // Ajouter à la liste des articles masqués
                    }
                }
            });
            updateArticleDisplay(); // Mettre à jour l'affichage pour ajouter ou retirer la classe cachée
        };
        div.appendChild(button);
    });
}

// Initialiser la liste et les éléments d'interface
document.addEventListener("DOMContentLoaded", function() {
    populateList();
    updateArticleDisplay();
});
