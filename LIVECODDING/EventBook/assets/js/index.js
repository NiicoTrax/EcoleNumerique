const eventCategoryContainer = document.getElementById('event-category-container');
const eventCategoryLis= eventCategoryContainer.getElementsByTagName('li');
const eventsContainer = document.querySelector('.event-container');
const search = document.getElementById('search');


const displayEvent = function(img,id,description,date) {

    let eventContainer = document.createElement('div');
    eventContainer.className = 'animation-progressiveDisplay';
    eventContainer.setAttribute('data-category',img);

    eventContainer.innerHTML = `<img src="assets/img/event/${img}.jpg" width="150">
    <h3>Evenement ${id}</h3>
    <time>Le ${date.toLocaleDateString()} à ${date.toLocaleTimeString()}</time>
    <p>${description}</p>
    <hr>
    <a href="event.html?id=${id}" class="event-button">En savoir plus</a>`;

    eventsContainer.appendChild(eventContainer);
}


eventsHandler.getEvents().forEach(function(event, index) {
    displayEvent(event.category,(index+1), event.description, event.startDate);
});



    for (let item of eventCategoryLis) {
        item.addEventListener('click', function(event) {

            let category = this.getAttribute('data-category');

            let elements;
            let tempElement = eventCategoryContainer.querySelector('.active');
            if(tempElement && tempElement != this)
                {
                    tempElement.classList.toggle('active');
                }
                this.classList.toggle('active');

                switch(this.getAttribute('data-category'))
                {
                    case "tous":
                        elements = eventsContainer.querySelectorAll('div');
                        elements.forEach(function(item) {
                            item.style.display = 'block';
                        });
                    break;

                    default:
                        elements = eventsContainer.querySelectorAll('div');
                        elements.forEach(function(item) {
                            item.style.display = 'none';
                        });

                        let elementsToDisplay = eventsContainer.querySelectorAll(`div[data-category="${category}"`);
                        elementsToDisplay.forEach(function(item) {
                            item.style.display = 'block';
                        });
                    break;
                }

         });
}

search.addEventListener('input', function(ev) {
    let searchTerm = (ev.target.value);
    let eventsDataFiltered = eventsHandler.searchEventByName(searchTerm);

    if(eventsDataFiltered.length > 0)
    {
        eventsContainer.innerHTML = '';
        eventsDataFiltered.forEach(function(event) {
            let eventID = eventsData.indexOf(event)+1;
            displayEvent (event.category,eventID, event.description, event.startDate);
        });
    }

});