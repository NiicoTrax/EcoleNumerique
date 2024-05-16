const purchaseTicketsForm = document.getElementById('purchase-tickets-form');
const purchaseTicketsInputs= purchaseTicketsForm.querySelectorAll('input[type="number"]');

purchaseTicketsInputs[0].addEventListener('change', function() {
    console.log(this.value*35);

});