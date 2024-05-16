const eventCategoryContainer = document.getElementById(event-category-container);
const eventCategoryLi= eventCategoryContainer.getElementsByTagName('li');

eventCategoryLi[0].addEventListener('click', function(event) {
    this.classlist.toggle('active');
});

eventCategoryLi[1].addEventListener('click', function(event) {
    this.classlist.toggle('active');
    let tempElement = eventCategoryContainer.querySelector('.active');
});

eventCategoryLi[2].addEventListener('click', function(event) {
    this.classlist.toggle('active');
    let tempElement = eventCategoryContainer.querySelector('.active');
});

