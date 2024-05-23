const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const eventID = parseInt(urlParams.get('id'));

try {
    if(eventID > eventsData.length)
{
    throw " Aucun Evenement n'existe avec cet identifiant";
}
}
catch(error)
{
    document.getElementsByClassName('container')[0].innerHTML = error;
}


const domEventTitle = document.querySelector('h2');
domEventTitle.innerHTML = eventsData[eventID-1][0];

const domEventDescription = document.getElementById('event-description');
domEventDescription.innerHTML = eventsData[eventID-1][1];

document.getElementById('event-image').src = "assets/img/event/"+eventsData[eventID-1][2]+".jpg";

const domEventTicketsTable = document.querySelector('table')

const randomPrice = Math.floor((Math.random()*100))+1;

const tickets = eventsData[eventID-1][3];

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



if(tickets) 
{
    tickets.forEach(function(ticket) {
        displayTicket(ticket[0],ticket[1]);
    });
}