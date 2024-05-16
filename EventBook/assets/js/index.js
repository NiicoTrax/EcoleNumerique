const eventCategoryContainer = document.getElementById(event-category-container);
const eventCategoryLi= eventCategoryContainer.getElementsByTagName('li');

eventCategoryLi[0].addEventListener('click', function(event) {
    this.classlist.toggle('active');
    if(tempElement != this )

        {
            tempElement.classList.toggle('active');
        }

});

eventCategoryLi[1].addEventListener('click', function(event) {
    let tempElement = eventCategoryContainer.querySelector('.active');
    if(tempElement)
        {
            tempElement.classList.toggle('active');
        }


    this.classlist.toggle('active');
});

eventCategoryLi[2].addEventListener('click', function(event) {
    let tempElement = eventCategoryContainer.querySelector('.active');
    if(tempElement)
        {
            tempElement.classList.toggle('active');
        } 


    this.classlist.toggle('active');
});

