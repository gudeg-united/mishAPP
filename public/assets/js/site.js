(function() {
  var initMap;
  var globalMap;

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
    myLatlng = new google.maps.LatLng(-6.204808, 107.014730);
    mapOptions = {
      zoom: 16,
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
      content: '<div class="map-pin"></div>'
    });
  };

  globalMap = function() {
    var map, mapOptions, marker, myLatlng, markers=[];
    myLatlng = new google.maps.LatLng(-6.204808, 107.014730);
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
    // console.log(map);
    for (i = 0; i < values.length; i++) {
      marker = new RichMarker({
        position: new google.maps.LatLng(values[i][0], values[i][1]),
        map: map,
        content: '<div id="pin-' + i + '" class="map-pin"></div>'
      });
      // marker = new google.maps.Marker({
      //   position: new google.maps.LatLng(locations[i][1], locations[i][2]),
      //   map: map
      // });

      // google.maps.event.addListener(marker, 'click', (function(marker, i) {
      //   return function() {
      //     infowindow.setContent(events[i][0]);
      //     infowindow.open(map, marker);
      //   }
      // })(marker, i));
    }


  };

  // google.maps.event.addDomListener(window, 'load', initMap);
  google.maps.event.addDomListener(window, 'load', globalMap);

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



  // var markers=[];
  // $.each(values, function(i, item) {
  //   var marker = new Object();
  //       marker.lat = values[i][0];
  //       marker.lng = values[i][1];
  //       marker.options = new Object();
  //       // marker.options.icon = new google.maps.MarkerImage("http://maps.google.com/mapfiles/marker.png");
  //       markers.push(marker);
  // });

  // $('#map').gmap3({
  //   getgeoloc:{
  //     callback : function(latLng){
  //       if (latLng){
  //         $(this).gmap3({
  //           marker:{
  //             latLng:latLng
  //           },
  //           map:{
  //             // options:{
  //             //   zoom: 14
  //             // }
  //           }
  //         });
  //       }
  //     }
  //   },
  //   marker:{
  //     values: markers
  //   }
  // });

}).call(this);
