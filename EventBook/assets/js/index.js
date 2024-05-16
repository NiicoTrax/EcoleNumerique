const eventCategoryContainer = document.getElementById('event-category-container');
const eventCategoryLis= eventCategoryContainer.getElementsByTagName('li');

eventCategoryLis[0].addEventListener('click', function(event) {
    let tempElement = eventCategoryContainer.querySelector('.active');
    if(tempElement != this )
        {
            tempElement.classList.toggle('active');
        }
        
        this.classlist.toggle('active');

});

eventCategoryLis[1].addEventListener('click', function(event) {
    let tempElement = eventCategoryContainer.querySelector('.active');
    if(tempElement)
        {
            tempElement.classList.toggle('active');
        }


    this.classlist.toggle('active');
});

eventCategoryLis[2].addEventListener('click', function(event) {
    let tempElement = eventCategoryContainer.querySelector('.active');
    if(tempElement)
        {
            tempElement.classList.toggle('active');
        } 


    this.classlist.toggle('active');
});

