window.addEventListener('load',() => {
    let lati1;
    let longi1;
    let a  = document.querySelector('#lat-long');
    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(position => {
            lati1 = position.coords.latitude;
            longi1  = position.coords.longitude;
         
            console.log(lati1)
            console.log(longi1)
            a.textContent = lati1
            function initialize() {
                var pyrmont = new google.maps.LatLng(lat, long); 
              
                map = new google.maps.Map(document.getElementById('map-canvas'), {
                  center: pyrmont,
                  zoom: 15
                });
              
                var request = {
                  location: pyrmont,
                  radius: 200,
                  types: ['hospital', 'health'] 
                };
                infowindow = new google.maps.InfoWindow();
                var service = new google.maps.places.PlacesService(map);
                service.nearbySearch(request, callback);
              }
              
              function callback(results, status) {
                if (status == google.maps.places.PlacesServiceStatus.OK) {
                  for (var i = 0; i < results.length; i++) {
                    createMarker(results[i]);
                  }
                }
              }
              
              function createMarker(place) {
                var placeLoc = place.geometry.location;
                var marker = new google.maps.Marker({
                  map: map,
                  position: place.geometry.location
                });
              
                google.maps.event.addListener(marker, 'click', function() {
                  infowindow.setContent(place.name);
                  infowindow.open(map, this);
                });
              }
              
              google.maps.event.addDomListener(window, 'load', initialize);
              var map;
              function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                  center:0 {lat: lati1, lng: longi1},
                  zoom: 8
                });
              }
        });
        
        }
});
var map;
var infowindow;

