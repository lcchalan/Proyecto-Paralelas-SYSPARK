<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title></title>
   <link rel="stylesheet" href="style.css">

  <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script> 
  <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
  <script >

    function initialize() { 
      var latitud;
      var longitud;
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          latitud = position.coords.latitude;
          longitud = position.coords.longitude;
          var myLatlng = new google.maps.LatLng(latitud,longitud);
          var mapOptions = {
            zoom: 13,
            center: myLatlng
          }
        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);   
        
          var marcador = new google.maps.LatLng(latitud, longitud);
          var marker = new google.maps.Marker({
              position: marcador,
              draggable: true,
              map: map,
              title: 'hola'
          });
          var markerLatLng = marker.getPosition();
            google.maps.event.addListener(marker, 'click', function(){                                
                  var popup = new google.maps.InfoWindow();
                  
                  var note = (markerLatLng.lat()+ ', '+ markerLatLng.lng());                  
                  console.log(note)
                  document.getElementById('latitud').innerHTML=note;
                  popup.setContent(note);
                  popup.open(map, this);
            })
        });
      } 
      }
    google.maps.event.addDomListener(window, 'load', initialize);
  </script>



  </head>
  <body>
      <div class="col-md-6">
              <h4>Location</h4>
              <section id="map-canvas"></section>  
              <div id="latitud"></div>           
              <input type="text" id="latitud">
            </div>
     
    
  </body>
</html>

     
          



