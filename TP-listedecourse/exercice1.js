// Inutile de modifier le code suivant
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

// Votre code à partir d'ici :

// Fonction pour ajouter les articles à la liste
function populateList() {
    var ul = document.getElementById("listeCourse");
    ul.innerHTML = ""; // Clear the list first
    articles.forEach((item, index) => {
        var li = document.createElement("li");
        li.textContent = item;
        var hideLink = document.createElement("a");
        hideLink.href = "#";
        hideLink.textContent = " [masquer]";
        hideLink.onclick = function() {
            li.style.display = "none";
        };
        var deleteLink = document.createElement("a");
        deleteLink.href = "#";
        deleteLink.textContent = " [supprimer]";
        deleteLink.onclick = function() {
            articles.splice(index, 1);
            populateList();
            updateArticleDisplay();
        };
        var moveUpLink = document.createElement("a");
        moveUpLink.href = "#";
        moveUpLink.textContent = " [monter]";
        moveUpLink.onclick = function() {
            if (index > 0) {
                [articles[index], articles[index - 1]] = [articles[index - 1], articles[index]];
                populateList();
                updateArticleDisplay();
            }
        };
        var moveDownLink = document.createElement("a");
        moveDownLink.href = "#";
        moveDownLink.textContent = " [descendre]";
        moveDownLink.onclick = function() {
            if (index < articles.length - 1) {
                [articles[index], articles[index + 1]] = [articles[index + 1], articles[index]];
                populateList();
                updateArticleDisplay();
            }
        };
        li.appendChild(hideLink);
        li.appendChild(deleteLink);
        li.appendChild(moveUpLink);
        li.appendChild(moveDownLink);
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

// Fonction pour mettre à jour l'affichage du tableau
function updateArticleDisplay() {
    var div = document.getElementById("articleDisplay");
    div.textContent = "Contenu du tableau: " + articles.join(", ");
}

// Initialiser la liste et les éléments d'interface
document.addEventListener("DOMContentLoaded", function() {
    var input = document.createElement("input");
    input.type = "text";
    input.id = "newArticle";
    var button = document.createElement("button");
    button.textContent = "Ajouter";
    button.onclick = addArticle;
    document.body.appendChild(input);
    document.body.appendChild(button);

    var removeButton = document.createElement("button");
    removeButton.textContent = "Supprimer la dernière entrée";
    removeButton.onclick = removeLastArticle;
    document.body.appendChild(removeButton);

    var articleDiv = document.createElement("div");
    articleDiv.id = "articleDisplay";
    document.body.appendChild(articleDiv);
    
    populateList();
    updateArticleDisplay();
});






