$('#buttons').hide();

function geoSuccess(position) {
    $('#latitude').val(position.coords.latitude);
    $('#longitude').val(position.coords.longitude);

    $('.report-disaster').each(function() {
        if ($(this).hasClass('enabled')) {
            var url = $(this).attr('href') + '&long=' + position.coords.longitude + '&lat=' + position.coords.latitude;
            $(this).attr('href', url);
        }
    });
    $('#disaster-nearby').attr('href', $('#disaster-nearby').attr('href') + '?long=' + position.coords.longitude + '&lat=' + position.coords.latitude);
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
