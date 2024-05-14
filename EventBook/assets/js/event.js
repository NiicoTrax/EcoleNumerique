const eventName = "Nom de l'événement stocké dans une variable" ;
const eventDescription = "Description de l'événement" ;
const ticketType1 = "Billet Classique" ;
const ticketType2 = "Billet VIP" ;
const ticketType1Price = 35 ;
const ticketType2Price = 65 ;

const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const eventID = urlParams.get('id');

const displayTicket = function(ticketType, ticketPrice)
{
    return  `<tr>
                <td>${ticketType}</td>
                <td>${ticketPrice}€</td>
                <td><a href="purchaseTickets.html" class="event-button">Acheter</a></td>
            </tr>`;
}