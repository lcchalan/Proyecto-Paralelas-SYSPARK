<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title></title>
   <link rel="stylesheet" href="style.css">

  <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script> 
  <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
  <script >

    var map = null;
    var infoWindow = null;
 
function openInfoWindow(marker) {
    var markerLatLng = marker.getPosition();
    var note = (markerLatLng.lat()+' '+markerLatLng.lng());
    document.getElementById('latitud').value = markerLatLng.lat();
    document.getElementById('longitud').value = markerLatLng.lng();
    infoWindow.setContent(note);
    infoWindow.open(map, marker);
}
 
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


            
         
            map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
         
            infoWindow = new google.maps.InfoWindow();
         
            var marker = new google.maps.Marker({
                position: myLatlng,
                draggable: true,
                map: map,
                title:'Coordenadas',
            });
         
            google.maps.event.addListener(marker, 'dragend', function(){
                openInfoWindow(marker);
            });
          });
        } 

}
 
$(document).ready(function() {
    initialize();
});
  </script>



  </head>
  <body>
      <div class="col-md-6">
              <h4>Location</h4>
              <section id="map-canvas"></section>                          
              <input type="text" id="latitud">
              <input type="text" id="longitud">

            </div>
     
    
  </body>
</html>

     
          



