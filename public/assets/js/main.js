function geoSuccess(position) {
    $('#latitude').val(position.coords.latitude);
    $('#longitude').val(position.coords.longitude);

    $('#buttons').show();
    $('#messageButtons').hide();
}

function geoError() {
    return false;
}

function getLocation() {
    if(navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(geoSuccess, geoError);
    } else {
        return false;
    }
}

function getPosition() {
    var position = {
        'long' : $('#longitude').val(),
        'lat' : $('#latitude').val()
    };

    return position;
}

$(document).ready(function() {
    $('#buttons').hide();

    getLocation();

    $('.report-disaster').click(function() {
        var url = $(this).attr('href') + '&long=' + $('#longitude').val() + '&lat=' + $('#latitude').val();
        window.location.href = url;
        return false;
    });
});