function Event(name,description,category,tickets,startDate)
{
    this.name = name;
    this.description = description;
    this.category = category;
    this.tickets = tickets;
    this.startDate = startDate;
}


const eventsData = [
    new Event('Evenement 1',
    'premiere du premier événement.<br>Seconde ligne de la description.',
    'concert',
        [
            ['Billet classique',35],
            ['Billet VIP',65]
        ],
        new Date('2024-06-15T20:00:00')
    )
    ,
    new Event('Evenement 2',
    'premiere du premier événement.<br>Seconde ligne de la description.',
    'concert',
        [
            ['Billet classique',35]
        ],
        new Date('2024-07-15T19:30:00')
    ),
    new Event('Evenement 3',
    'premiere du premier événement.<br>Seconde ligne de la description.',
    'conference',
        [
            ['Billet aleatoire', Math.floor((Math.random()*100))+1]
        ],
        new Date('2024-08-15T16:30:00')
    ),
    new Event('Evenement 4',
    'premiere du premier événement.<br>Seconde ligne de la description.',
    'conference',
        [
            ['Billet aleatoire', Math.floor((Math.random()*100))+1]
        ],
        new Date('2024-09-15T14:00:00')
    )
];

const eventsHandler = {
    currentEvent : null,
    events: eventsData,

    getEvents: function() {
        return this.events;
    },
    searchEventByName: function(searchTerm) {
        return this.events.filter(function(event) {
            return (event.name.indexOf(searchTerm) > -1);
        });
    },
    getEventById: function(eventId) {
        this.currentEvent = this.events[eventId];
  },
  getCurrentEvent: function()  {
    return this.currentEvent;
  },
  getEventName: function() {
    return this.currentEvent.name;
  },
  getEventDescription: function() {
    return this.currentEvent.description;
  },
  getEventCategory: function() {
    return this.currentEvent.category;
  },
  getEventTickets: function() {
    return this.currentEvent.tickets;
  },
  getEventStartDate: function() {
    return this.currentEvent.startDate;
  }
};





















