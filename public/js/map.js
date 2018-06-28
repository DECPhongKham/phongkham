
    var customLabel = {
        // clinic: {
        //   label: 'C'
        // }
        // ,bar: {
        //   label: 'B'
        // }
      };
      var map, marker, infowindow;
      var markers = [];
      var address_infos = {};
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
       
        var map = new google.maps.Map(document.getElementById('map'), {
          mapTypeControl: true,
          // center: {lat: 10.794882, lng: 106.641344},
          center: {lat: 10.794882, lng: 106.641344},
          zoom: 16
        });
    //     var marker = new google.maps.Marker({
    //   position: {lat: 10.794882, lng: 106.641344},
    //   animation: google.maps.Animation.BOUNCE,
    //   map: map
    // });
    //load chi đường
        new AutocompleteDirectionsHandler(map);
        //load vị trí hiện tại
        var infoWindow = new google.maps.InfoWindow;

        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Vị Trí Hiện Tại');

            infoWindow.open(map);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
        //load tìm kiếm
        placeMarker({ lat: 21.0167904, lng: 105.7819856 });
  geocodeAddress(marker.position);
  map.panTo(marker.position);
  markers.push(marker);

  map.addListener("click", function(e) {
    clearMarkers();
    placeMarker(e.latLng);
    geocodeAddress(e.latLng);
    map.panTo(marker.position);
    markers.push(marker);
  });

  createInfoWindow();
  
  // Create the search box and link it to the UI element.
  var input = document.getElementById('pac-input');
  var searchBox = new google.maps.places.SearchBox(input);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  // Bias the SearchBox results towards current map's viewport.
  // map.addListener('bounds_changed', function() {
    // searchBox.setBounds(map.getBounds());
  // });

  searchBox.addListener("places_changed", function() {
    searchBox.set("map", null);
    clearMarkers();
    var places = searchBox.getPlaces();
    if (places.length == 0) {
      console.log("Returned no place");
      return;
    }
     var bounds = new google.maps.LatLngBounds();

     if (places.length > 1) {
      places.forEach(function(place) {
        if (!place.geometry) {
          console.log("Returned place contains no geometry");
          return;
        }
        var icon = {
          url: place.icon,
          size: new google.maps.Size(71, 71),
          origin: new google.maps.Point(0, 0),
          anchor: new google.maps.Point(17, 34),
          scaledSize: new google.maps.Size(25, 25)
        };

        marker = new google.maps.Marker({
          map: map,
          icon: icon,
          title: place.name,
          position: place.geometry.location
        });

        marker.bindTo("map", searchBox, "map");
        marker.addListener("map_changed", function() {
          if (!this.getMap()) {
            this.unbindAll();
          }
        });

        if (place.geometry.viewport) {
          // Only geocodes have viewport.
          bounds.union(place.geometry.viewport);
        } else {
          bounds.extend(place.geometry.location);
        }
      });

      map.fitBounds(bounds);
      searchBox.set("map", map);
      map.setZoom(Math.min(map.getZoom(),15));
      // searchBox.setBounds(map.getBounds());
    } else {
      infowindow.close();
      var place = places[0];
      if (!place.geometry) {
        console.log("Returned place contains no geometry");
        return;
      }

      placeMarker(place.geometry.location);

      marker.bindTo("map", searchBox, "map");
      marker.addListener("map_changed", function() {
        if (!this.getMap()) {
          this.unbindAll();
        }
      });

      create_address_infos(place);
      infowindow.setContent(
        "<div>" +
          "<b>Address :</b> " + place.formatted_address + "<br>" +
          "<b>Latitude :</b> " + place.geometry.location.lat() + "<br>" +
          "<b>Longitude :</b> " + place.geometry.location.lng() +
        "</div>"
      );

      if (place.geometry.viewport) {
        // Only geocodes have viewport.
        bounds.union(place.geometry.viewport);
      } else {
        bounds.extend(place.geometry.location);
      }

      map.fitBounds(bounds);
      searchBox.set("map", map);
      map.setZoom(Math.min(map.getZoom(),15));
      infowindow.open(map, marker);
      markers.push(marker);
    }
  });  
            //load marker
          // Change this depending on the name of your PHP or XML file
          downloadUrl('markers1.xml', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                animation: google.maps.Animation.BOUNCE,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
          
        }
        function placeMarker(latLng) {
          marker = new google.maps.Marker({
            position: latLng,
            map: map
          });
        }

        function createInfoWindow() {
          if (infowindow) {
            infowindow.close();
          }
          infowindow = new google.maps.InfoWindow();
        }

        function geocodeAddress(latLng) {
          var geocoder = new google.maps.Geocoder;
          createInfoWindow();

          geocoder.geocode(
            { "location": latLng },
            function(results, status) {
              if (status === google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                  create_address_infos(results[0]);

                  infowindow.setContent(
                    "<div>" +
                      "<b>Address :</b> " + address_infos["name"] + "<br>" +
                      "<b>Latitude :</b> " + address_infos["latitude"] + "<br>" +
                      "<b>Longitude :</b> " + address_infos["longitude"] +
                    "</div>"
                  );
                  infowindow.open(map, marker);
                } else {
                  console.log("No results found");
                }
              } else {
                console.log("Geocoder failed due to: " + status);
              }
            }
          );
        }

        function clearMarkers() {
          for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(null)
          }
          markers = [];
        }

        function create_address_infos(address) {
          address_infos = {
            name: address.formatted_address.toString(),
            latitude: address.geometry.location.lat(),
            longitude: address.geometry.location.lng(),
            prefecture: "",
            city: "",
            town: "",
            choume: "",
            banchi: "",
            gou: ""
          }
        }
        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }
      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request,request.status);
          }
        };
        request.open('GET', url, true);
        request.send(null);

        
      }
      function doNothing() {}
       /**
        * @constructor
       */
      function AutocompleteDirectionsHandler(map) {
        this.map = map;
        this.originPlaceId = null;
        this.destinationPlaceId = null;
        this.travelMode = 'WALKING';
        var originInput = document.getElementById('origin-input');
        var destinationInput = document.getElementById('destination-input');
        var modeSelector = document.getElementById('mode-selector');
        this.directionsService = new google.maps.DirectionsService;
        this.directionsDisplay = new google.maps.DirectionsRenderer;
        this.directionsDisplay.setMap(map);

        var originAutocomplete = new google.maps.places.Autocomplete(
            originInput, {placeIdOnly: true});
        var destinationAutocomplete = new google.maps.places.Autocomplete(
            destinationInput, {placeIdOnly: true});

        this.setupClickListener('changemode-walking', 'WALKING');
        this.setupClickListener('changemode-transit', 'TRANSIT');
        this.setupClickListener('changemode-driving', 'DRIVING');

        this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
        this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(destinationInput);
        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
      }

      // Sets a listener on a radio button to change the filter type on Places
      // Autocomplete.
      AutocompleteDirectionsHandler.prototype.setupClickListener = function(id, mode) {
        var radioButton = document.getElementById(id);
        var me = this;
        radioButton.addEventListener('click', function() {
          me.travelMode = mode;
          me.route();
        });
      };

      AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(autocomplete, mode) {
        var me = this;
        autocomplete.bindTo('bounds', this.map);
        autocomplete.addListener('place_changed', function() {
          var place = autocomplete.getPlace();
          if (!place.place_id) {
            window.alert("Please select an option from the dropdown list.");
            return;
          }
          if (mode === 'ORIG') {
            me.originPlaceId = place.place_id;
          } else {
            me.destinationPlaceId = place.place_id;
          }
          me.route();
        });

      };

      AutocompleteDirectionsHandler.prototype.route = function() {
        if (!this.originPlaceId || !this.destinationPlaceId) {
          return;
        }
        var me = this;

        this.directionsService.route({
          origin: {'placeId': this.originPlaceId},
          destination: {'placeId': this.destinationPlaceId},
          travelMode: this.travelMode
        }, function(response, status) {
          if (status === 'OK') {
            me.directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      };
