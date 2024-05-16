const eventCategoryContainer = document.getElementById(event-category-container);
const eventCategoryLi= eventCategoryContainer.getElementsByTagName('li');

eventCategoryLi[0].addEventListener('click', function() {
    alert("Ca fonctionne");
});