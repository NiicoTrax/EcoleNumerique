const eventName = "Nom de l'événement stocké dans une variable" ;
const eventDescription = "Description de l'événement stocké dans une variable" ;
const ticketType1 = "Billet Classique" ;
const ticketType2 = "Billet VIP" ;
const ticketType1Price = 35 ;
const ticketType2Price = 65 ;

const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const eventID = urlParams.get('id');

const domEventTitle = document.querySelector('h2');
domEventTitle.innerHTML = eventName;

const domEventDescription = document.getElementById('event-description');
domEventDescription.innerHTML = eventDescription;

const domEventTicketsTable = document.querySelector('table')

const displayTicket = function(ticketType, ticketPrice){

    let tr = document.createElement('tr');
    let td1 = document.createElement('td');
    let td2 = document.createElement('td');
    let td3 = document.createElement('td');

    td1.innerHTML = ticketType;
    td2.innerHTML = ticketPrice;
    td3.innerHTML = `<a href="purchaseTickets.html?eventId=${eventID}" class="event-button">Acheter</a>`

    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);

    domEventTicketsTable.appendChild(tr);
}

switch (eventID)
{
    case "1":
        displayTicket("Billet Classique", 35);
        displayTicket("Billet VIP", 65);
    break;

    case "2":
        displayTicket("Billet classique", 35);
    break;

    default:
        displayTicket("Billet classique", 20);
    break;
}
