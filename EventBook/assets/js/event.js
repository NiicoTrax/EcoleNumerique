const eventName = "Nom de l'événement stocké dans une variable" ;
const eventDescription = "Description de l'événement stocké dans une variable" ;

const ticketType1 = "Billet Classique" ;
const ticketType2 = "Billet VIP" ;
const ticketType1Price = 35 ;
const ticketType2Price = 65 ;

const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const eventID = parseInt(urlParams.get('id'));

const domEventTitle = document.querySelector('h2');
domEventTitle.innerHTML = eventsData[eventID-1][0];

const domEventDescription = document.getElementById('event-description');
domEventDescription.innerHTML = eventsData[eventID-1][1];

document.getElementById('event-image').src = "assets/img/event/"+eventsData[eventID-1][2]+".jpg";

const domEventTicketsTable = document.querySelector('table')

const randomPrice = Math.floor((Math.random()*100))+1;

const displayTicket = function(ticketType, ticketPrice){

    let tr = document.createElement('tr');
    let td1 = document.createElement('td');
    let td2 = document.createElement('td');
    let td3 = document.createElement('td');

    td1.innerHTML = ticketType;
    td2.innerHTML = ticketPrice+'€';
    td3.innerHTML = `<a href="purchaseTickets.html?eventId=${eventID}" class="event-button">Acheter</a>`

    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);

    domEventTicketsTable.appendChild(tr);
}

try {
    if(eventID > 15)
{
    throw " Aucun Evenement n'existe avec cet identifiant";
}
}
catch(error)
{
    document.getElementsByClassName('container')[0].innerHTML = error;
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
        displayTicket("Billet classique",randomPrice);
    break;
}
