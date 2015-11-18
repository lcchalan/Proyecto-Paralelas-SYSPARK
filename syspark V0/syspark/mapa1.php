<?php 
include('connect_mysql.php');
 ?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Maps</title>
		<link rel="stylesheet" href="style.css">
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
		
		<script >
		/*para cambiar el tamaño al mapa debe ser en style.css*/
			function initialize() {
		  var myLatlng = new google.maps.LatLng(-3.997328, -79.20586);
		  var mapOptions = {
		    zoom: 13,
		    center: myLatlng
		  }
		  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);			
		  	<?php 
				$sql='select * from mapas';
				$consulta=mysql_query($sql);
				while ($fila=mysql_fetch_array($consulta)) {	
		 	?>

		  	var marcador = new google.maps.LatLng('<?php echo $fila["latitud"] ?>', '<?php echo $fila["longitud"] ?>');
		  	var marker = new google.maps.Marker({
			      position: marcador,
			      map: map,
			      title: 'Estacionamiento'
			  });
		      google.maps.event.addListener(marker, 'click', function(){
		            var popup = new google.maps.InfoWindow();
		            var note = '<?php echo $fila["descripcion"] ?>';
		            popup.setContent(note);
		            popup.open(map, this);
		      })
		
			<?php } ?>
	 
			}
			google.maps.event.addDomListener(window, 'load', initialize);
		</script>
	</head>
	<body>

		<div>
		<h3>Ubicacion de todos los hoteles en  Google Maps</h3>
		<section id="map-canvas"></section>
		</div>
	</body>
</html>