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

    Notification.requestPermission( function(status) {

    });
    PUBNUB.init({
        subscribe_key: 'sub-c-40e909a0-7dff-11e4-bfb6-02ee2ddab7fe'
    }).subscribe({
        channel : 'globaldisaster',
        message : function(msg) {
            if (typeof msg.properties.place != 'undefined') {
                var messageCity = msg.properties.place;
            } else if (typeof msg.properties.country != 'undefined') {
                var messageCity = msg.properties.country;
            } else {
                var messageCity = 'unknown place';
            }

            var messageText = 'Warning disaster at ' + messageCity;
            var messageUrl = 'http://mishapp.blackbiron.koding.io/disasters/detail?id=' + msg.id;

            var n = new Notification("mishAPP Disaster Alert!!", {
                body: messageText,
                icon: 'http://mishapp.blackbiron.koding.io/apple-touch-icon-144x144-precomposed.png',
            });

            n.onclick = function() {
                console.log(messageUrl);
                // window.open(messageUrl);
            };
        }
    });    
});
