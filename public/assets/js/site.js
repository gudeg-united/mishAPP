(function() {
  var initMap;

  $('#mapbg').gmap3({
    map: {
      options: {
        zoom: 10,
        disableDefaultUI: true,
        styles: [
          {
            featureType: "water",
            elementType: "geometry",
            stylers: [
              {
                color: "#193341"
              }
            ]
          }, {
            featureType: "landscape",
            elementType: "geometry",
            stylers: [
              {
                color: "#2c5a71"
              }
            ]
          }, {
            featureType: "road",
            elementType: "geometry",
            stylers: [
              {
                color: "#29768a"
              }, {
                lightness: -37
              }
            ]
          }, {
            featureType: "poi",
            elementType: "geometry",
            stylers: [
              {
                color: "#406d80"
              }
            ]
          }, {
            featureType: "transit",
            elementType: "geometry",
            stylers: [
              {
                color: "#406d80"
              }
            ]
          }, {
            elementType: "labels.text.stroke",
            stylers: [
              {
                visibility: "on"
              }, {
                color: "#3e606f"
              }, {
                weight: 2
              }, {
                gamma: 0.84
              }
            ]
          }, {
            elementType: "labels.text.fill",
            stylers: [
              {
                color: "#2c5a71"
              }
            ]
          }, {
            featureType: "administrative",
            elementType: "geometry",
            stylers: [
              {
                weight: 0.6
              }, {
                color: "#1a3541"
              }
            ]
          }, {
            elementType: "labels.icon",
            stylers: [
              {
                visibility: "off"
              }
            ]
          }, {
            featureType: "poi.park",
            elementType: "geometry",
            stylers: [
              {
                color: "#2c5a71"
              }
            ]
          }
        ]
      },
      address: 'Jakarta, Indonesia'
    }
  });

  initMap = function() {
    var map, mapOptions, marker, myLatlng;

    if ((typeof customLon != 'undefined') && (typeof customLat != 'undefined')) {
      myLatlng = new google.maps.LatLng(customLat, customLon);
    } else {
      myLatlng = new google.maps.LatLng(-6.204808, 107.014730);
    }

    mapOptions = {
      zoom: 15,
      center: myLatlng,
      styles: [
        {
          featureType: "water",
          elementType: "geometry",
          stylers: [
            {
              color: "#193341"
            }
          ]
        }, {
          featureType: "landscape",
          elementType: "geometry",
          stylers: [
            {
              color: "#2c5a71"
            }
          ]
        }, {
          featureType: "road",
          elementType: "geometry",
          stylers: [
            {
              color: "#29768a"
            }, {
              lightness: -37
            }
          ]
        }, {
          featureType: "poi",
          elementType: "geometry",
          stylers: [
            {
              color: "#406d80"
            }
          ]
        }, {
          featureType: "transit",
          elementType: "geometry",
          stylers: [
            {
              color: "#406d80"
            }
          ]
        }, {
          elementType: "labels.text.stroke",
          stylers: [
            {
              visibility: "on"
            }, {
              color: "#3e606f"
            }, {
              weight: 2
            }, {
              gamma: 0.84
            }
          ]
        }, {
          elementType: "labels.text.fill",
          stylers: [
            {
              color: "#ffffff"
            }
          ]
        }, {
          featureType: "administrative",
          elementType: "geometry",
          stylers: [
            {
              weight: 0.6
            }, {
              color: "#1a3541"
            }
          ]
        }, {
          elementType: "labels.icon",
          stylers: [
            {
              visibility: "off"
            }
          ]
        }, {
          featureType: "poi.park",
          elementType: "geometry",
          stylers: [
            {
              color: "#2c5a71"
            }
          ]
        }
      ]
    };
    map = new google.maps.Map(document.getElementById('map'), mapOptions);
    return marker = new RichMarker({
      position: myLatlng,
      map: map,
      content: '<div class="map-pin" id="pin-1"></div>'
    });
  };

  globalMap = function() {
    var map, mapOptions, marker, myLatlng, markers=[];
    if ((typeof customLon != 'undefined') && (typeof customLat != 'undefined')) {
      myLatlng = new google.maps.LatLng(customLat, customLon);
    } else {
      myLatlng = new google.maps.LatLng(-6.204808, 107.014730);
    }
    mapOptions = {
      zoom: 2,
      center: myLatlng,
      styles: [
        {
          featureType: "water",
          elementType: "geometry",
          stylers: [
            {
              color: "#193341"
            }
          ]
        }, {
          featureType: "landscape",
          elementType: "geometry",
          stylers: [
            {
              color: "#2c5a71"
            }
          ]
        }, {
          featureType: "road",
          elementType: "geometry",
          stylers: [
            {
              color: "#29768a"
            }, {
              lightness: -37
            }
          ]
        }, {
          featureType: "poi",
          elementType: "geometry",
          stylers: [
            {
              color: "#406d80"
            }
          ]
        }, {
          featureType: "transit",
          elementType: "geometry",
          stylers: [
            {
              color: "#406d80"
            }
          ]
        }, {
          elementType: "labels.text.stroke",
          stylers: [
            {
              visibility: "on"
            }, {
              color: "#3e606f"
            }, {
              weight: 2
            }, {
              gamma: 0.84
            }
          ]
        }, {
          elementType: "labels.text.fill",
          stylers: [
            {
              color: "#ffffff"
            }
          ]
        }, {
          featureType: "administrative",
          elementType: "geometry",
          stylers: [
            {
              weight: 0.6
            }, {
              color: "#1a3541"
            }
          ]
        }, {
          elementType: "labels.icon",
          stylers: [
            {
              visibility: "off"
            }
          ]
        }, {
          featureType: "poi.park",
          elementType: "geometry",
          stylers: [
            {
              color: "#2c5a71"
            }
          ]
        }
      ]
    };
    map = new google.maps.Map(document.getElementById('map-global'), mapOptions);

    marker = new RichMarker({
      position: myLatlng,
      map: map,
      content: '<div class="map-pin"></div>'
    });

    for (i = 0; i < values.length; i++) {
      marker = new RichMarker({
        position: new google.maps.LatLng(values[i][0], values[i][1]),
        map: map,
        content: '<div id="pin-' + i + '" class="map-pin"></div>'
      });
    }
  };

  google.maps.event.addDomListener(window, 'load', globalMap);
  google.maps.event.addDomListener(window, 'load', initMap);

  $('a[title]').tooltip({
    position: {
      my: 'center top+15'
    },
    track: true,
    hide: {
      effect: 'explode',
      duration: 500
    }
  });

}).call(this);
