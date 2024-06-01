const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const eventID = parseInt(urlParams.get('eventId'));

const purchaseTicketsForm = document.getElementById('purchase-tickets-form');
const TicketsAvailableDiv = document.getElementById('tickets-available');
const eventArray = eventsData[eventID-1];
const eventTicketsArray = eventArray[3];

TicketsAvailableDiv.innerHTML ='';


function displayTicketinput(name) {
    return `<label for="${name.replace(' ','_').toLowerCase()}">${name}</label>
    <input type="number" name="${name.replace(' ','_').toLowerCase()}" id="${name.replace(' ','_').toLowerCase()}">`;
}

eventTicketsArray.forEach(function(ticket){
    TicketsAvailableDiv.innerHTML += displayTicketinput(ticket[0]);
});





/*const purchaseTicketsInputs= purchaseTicketsForm.querySelectorAll('input[type="number"]');

purchaseTicketsInputs[0].addEventListener('change', function() {
    console.log(this.value);
}); */