<!DOCTYPE>
<html>
	<head>
		<title>Registrar</title>
	</head>
	<body>
<?php 
	$server="localhost";
	$usuario="root";
	$contraseña="";
	$db="pruebas";
	$conexion = mysqli_connect($server, $usuario, $contraseña, $db)
		or die("Error en la conexion");
	
	$consulta = mysql_query($conexion, "SELECT * from registro");
		or die("Error al ingresar los registros");
		
	$row = mysql_fetch_row($consulta);
			
			$row['fechaInicio'];
			$row['fechaFin'];

			$total = $row['fechaInicio'] - $row['fechaFin'];
			echo $total;

	mysqli_close($conexion);
	echo "Datos insertados correctamente";

?>
	
	</body>
</html>
