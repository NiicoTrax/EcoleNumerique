const eventsData = [
    ['Evenement 1',
    'premiere du premier événement.<br>Seconde ligne de la description.',
    'concert',
        [
            ['Billet classique',35],
            ['Billet VIP',65]
        ],
        new Date('2024-06-15T20:00:00')
    ],
    ['Evenement 2',
    'premiere du premier événement.<br>Seconde ligne de la description.',
    'concert',
        [
            ['Billet classique',35]
        ],
        new Date('2024-07-15T19:30:00')
    ],
    ['Evenement 3',
    'premiere du premier événement.<br>Seconde ligne de la description.',
    'conference',
        [
            ['Billet aleatoire', Math.floor((Math.random()*100))+1]
        ],
        new Date('2024-08-15T16:30:00')
    ],
    ['Evenement 4',
    'premiere du premier événement.<br>Seconde ligne de la description.',
    'conference',
        [
            ['Billet aleatoire', Math.floor((Math.random()*100))+1]
        ],
        new Date('2024-09-15T14:00:00')
    ]
];

const eventObjet = { 
    name: 'Evenement 5',
    description: 'premiere du premier événement.<br>Seconde ligne de la description.',
    category: 'conference',
    tickets: [
        ['Billet aleatoire', Math.floor((Math.random()*100))+1]
    ],
    startDate: new Date('2024-10-15T14:00:00')
};

function Event(name,description,category,tickets,startDate)
{
    this.name = name;
    this.description = description;
    this.category = category;
    this.tickets = tickets;
    this.startDate = startDate;
}

const event6 = new Event('Evenement 6',
    'premiere du premier événement.<br>Seconde ligne de la description.',
    'conference',
    [
    ['Billet aleatoire', Math.floor((Math.random()*100))+1]
    ],
    new Date('2024-10-15T14:00:00') 
);


const eventsHandler = {
    currentEvent : null,
    events: eventsData,
    getEvents: function() {
        return this.events;
    },
    searchEventByName: function(searchTerm) {
        return this.events.filter(function(event) {
            return (event[0].indexOf(searchTerm) > -1);
        });
    },
    getEventById: function(eventId) {
        this.currentEvent = this.events[eventId];
  },
  getCurrentEvent: function()  {
    return this.currentEvent;
  },
  getEventName: function() {
    return this.currentEvent[0];
  }
};





















