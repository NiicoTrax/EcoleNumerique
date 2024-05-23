const eventCategoryContainer = document.getElementById('event-category-container');
const eventCategoryLis= eventCategoryContainer.getElementsByTagName('li');
const eventsContainer = document.querySelector('.event-container');

const displayEvent = function(img,id,description) {

    let eventContainer = document.createElement('div');
    eventContainer.className = 'animation-progressiveDisplay';

    eventContainer.innerHTML = `<img src="assets/img/event/${img}.jpg" width="150">
    <h3>Evenement ${id}</h3>
    <p${description}</p>
    <hr>
    <a href="event.html?${id}" class="event-button">En savoir plus</a>`;

    eventsContainer.appendChild(eventContainer);
}

eventCategoryLis[0].addEventListener('click', function(event) {
    let tempElement = eventCategoryContainer.querySelector('.active');
    if(tempElement != this)
        {
            tempElement.classList.toggle('active');
        }
        
        this.classList.toggle('active');

});

eventCategoryLis[1].addEventListener('click', function(event) {
    let tempElement = eventCategoryContainer.querySelector('.active');
    if(tempElement)
        {
            tempElement.classList.toggle('active');
        }


    this.classList.toggle('active');
});

eventCategoryLis[2].addEventListener('click', function(event) {
    let tempElement = eventCategoryContainer.querySelector('.active');
    if(tempElement)
        {
            tempElement.classList.toggle('active');
        } 


    this.classList.toggle('active');
});


for(let i = 0; i<5; i=i++ )
{
        evendID++;
        displayEvent ('concert',evendID, 'premiere du premier événement. <br>Seconde ligne de la description.');
}

let i2 = 0;
while(i2 < 10)
    {
        eventID++;
        displayEvent ('conference',evendID, 'premiere du premier événement. <br>Seconde ligne de la description.');
        i2++;
    }


    26min 40 ARRET VIDEO 