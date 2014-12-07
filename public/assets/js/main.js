$('#buttons').hide();

function geoSuccess(position) {
    $('#latitude').val(position.coords.latitude);
    $('#longitude').val(position.coords.longitude);

    $('.report-disaster').each(function() {
        var url = $(this).attr('href') + '&long=' + position.coords.longitude + '&lat=' + position.coords.latitude;
        $(this).attr('href', url);
    });

    $('.loading').fadeOut('normal', function() {
        $('#buttons').fadeIn('normal');
    });
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

    getLocation();

    $('.report-disaster').click(function() {
        // var url = $(this).attr('href') + '&long=' + $('#longitude').val() + '&lat=' + $('#latitude').val();
        // console.log(url);
        // // window.location.href = url;
        // return false;
    });
});
