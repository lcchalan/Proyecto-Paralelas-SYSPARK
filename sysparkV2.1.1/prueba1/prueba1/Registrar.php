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


	$insertar = "INSERT into dato values ('$date')";

	$resultado = mysqli_query($conexion, $insertar)
		or die("Error al ingresar los registros");

	mysqli_close($conexion);
	echo "Datos insertados correctamente";

?>
	
	</body>
</html>
