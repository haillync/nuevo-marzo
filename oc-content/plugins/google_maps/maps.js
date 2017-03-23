(function($){
  var map, marker;
  var markers = [];
  
  var inputAddress = '#address';
  var inputLat = '#lat';
  var inputLng = '#lng';
  
  // these are the links to activate the map plotting
  var domAddressConverter = '#geocode_address';
  var domCoordsConverter = '#geocode_coords';
  
  // you can change these values as they are only used for initial positioning
  var beginLat = 37.772323;
  var beginLng =  -122.214897;
  
  var contMap = '#map';
  var geocoder = new google.maps.Geocoder();
  
  function convertDivToMap()
  {
    // clear previous markers
    var latlng = new google.maps.LatLng(beginLat, beginLng);
    
    var mapOptions = {
      zoom : 17,
      center : latlng,
      mapTypeId : google.maps.MapTypeId.SATELLITE
    };
    
    map = new google.maps.Map($(contMap).get(0), mapOptions);
    
    // call a method to place the marker in the current map
    placeMarker(latlng);
  }
  
  // this function accepts an object of the google.maps.LatLng class
  function placeMarker(location)
  {
    // clear previous markers
    if(markers)
    {
      for(i in markers)
      {
        markers[i].setMap(null);
      }
    }
    // create a new marker
    var marker = new google.maps.Marker({
      position : location,
      map : map,
      draggable : true
    });
    
    // add created marker to a global array to be tracked and removed later
    markers.push(marker);
    
    map.setCenter(location);
    
    // extract lat and lng from LatLng location and put values in form
    $(inputLat).val(location.lat());
    $(inputLng).val(location.lng());
    
    /* 
     * when marker is dragged, extract coordinates, 
     * change form values and proceed with geocoding
     */
    google.maps.event.addListener(marker, 'dragend', function(){
      var coords = marker.getPosition();
      $(inputLat).val(coords.lat());
      $(inputLng).val(coords.lng());
      
      geocodeCoords(coords);
      map.setCenter(coords);
    });
  }
  
  function geocodeLocation(address)
  {
    geocoder.geocode({'address' : address}, function(result, status){
      // this returns a latlng
      var location = result[0].geometry.location;
      map.setCenter(location);
      
      // replace markers
      placeMarker(location);      
    });
  }
  
  function geocodeCoords(coords)
  {
    geocoder.geocode({'latLng':coords}, function(result, status){
      switch(status)
      {
        case 'ZERO_RESULTS':
          alert('Map does not contain details for the given address');
          break;
        
        case 'ERROR':
          alert('There was a problem in processing. Please try again later.');
          break;
          
        case 'OK':
          $(inputAddress).val(result[1].formatted_address);
          break;
      }
    });
  }
  
  function validateAndPlot()
  {
    // handle geocoding of given address
    $(domAddressConverter).click(function(e){
      e.preventDefault();
      
      if($(inputAddress).val().trim() == '')
      {
        alert('No address specified!');
      }
      else
      {
        geocodeLocation($(inputAddress).val());
      }
    });
    
    // handle geocoding of coordinates
    $(domCoordsConverter).click(function(e){
      e.preventDefault();
      
      if($(inputLat).val().trim() == '' ||
        $(inputLng).val().trim() == '')
      {
        alert('No coordinates or incomplete coordinates specified');
      }
      else
      {
        var lat = $(inputLat).val();
        var lng = $(inputLng).val();
        var location = new google.maps.LatLng(lat, lng);
        
        geocodeCoords(location);
      }
    });
  }
  
  // begin execution on page load
  $(function(){
    convertDivToMap();
    validateAndPlot();
  });
  
})(jQuery);