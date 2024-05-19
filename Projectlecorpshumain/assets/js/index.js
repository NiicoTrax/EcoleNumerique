$(document).ready(function() {
    $('area').on('click', function(event) {
        event.preventDefault();
        var areaId = $(this).attr('id');
        var infoText = '';

        switch(areaId) {
            case 'circle1':
                infoText = 'Information about area 1.';
                break;
            case 'circle2':
                infoText = 'Information about area 2.';
                break;
            case 'circle3':
                infoText = 'Information about area 3.';
                break;
            case 'circle4':
                infoText = 'Information about area 4.';
                break;
            case 'circle5':
                infoText = 'Information about area 5.';
                break;
            default:
                infoText = 'Click on the black circles to see information.';
        }

        $('#info-box').html('<p>' + infoText + '</p>');
    });
});
