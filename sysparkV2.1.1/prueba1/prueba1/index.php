<html>
<!DOCTYPE html>
<head>
	<title></title>
</head>
	<body>

	<form action="index.php" method="get">	
		<?php
			
			date_default_timezone_set("America/Guayaquil");
			$date1 = date("H:i:s");
			echo $date1;
		?>

	<?php 

	$server="localhost";
	$usuario="root";
	$contraseña="";
	$db="pruebas";
	$conexion = mysqli_connect($server, $usuario, $contraseña, $db)
	or die("Error en la conexion");


	$insertar = "INSERT into hola(horaInicio) values ('$date1')";

	$resultado = mysqli_query($conexion, $insertar)
		or die("Error al ingresar los registros");

	mysqli_close($conexion);
	
?>
	<input type="submit" value="Ocupado" />
	</form>
	
	<form method="get">	
		<?php
			
			date_default_timezone_set("America/Guayaquil");
			$date = date("H:i:s");
			echo $date;
		?>

	<?php 
	$server="localhost";
	$usuario="root";
	$contraseña="";
	$db="pruebas";
	$conexion = mysqli_connect($server, $usuario, $contraseña, $db)
	or die("Error en la conexion");


	$insertar = "INSERT into hola(horaFin) values ('$date')";

	$resultado = mysqli_query($conexion, $insertar)
		or die("Error al ingresar los registros");

	mysqli_close($conexion);
	
?>

	<input type="submit" value="Libre" />
	</form>

<?php

function resta($Hora_inicio, $Hora_fin)
{
	$dif=date("H:i:s", strtotime("00:00:00") + strtotime($Hora_fin) - strtotime($Hora_inicio) );
	return $dif;
}


function Multiplicacion($valor,$Costo)
{

	$cal=$Costo * $valor ;
	return $cal;
}

function Decimal($diferencia)
{
	$desglose=split(":", $diferencia);
	$dec=$desglose[0]+$desglose[1]/60;
	return $dec;	
}

// CONSULTA SELECT
$server="localhost";
$usuario="root";
$contraseña="";
$db="pruebas";
$conexion = mysqli_connect($server, $usuario, $contraseña, $db);

$consulta="select * from hola";
$resultado=$conexion->query($consulta);
while ($fila=$resultado->fetch_assoc()) {
	

// END SELECT


$Hora_inicio=$fila['horaInicio'];
$Hora_fin=$fila['horaFin'];
$diferencia=resta($Hora_inicio, $Hora_fin);
echo "La hora de incio es : $Hora_inicio </br>";
echo "Lahora de fin es:  $Hora_fin </br>";
echo "La diferencia es:  $diferencia </br>";

$valor=Decimal("$diferencia");
echo "La diferencia en decimal es $valor </br>";

$Costo="2";
$CostoTotal = Multiplicacion($valor,$Costo);
echo "El costo del parqueadero es de $Costo Dolares </br>";
echo "El costo es $CostoTotal Dolares";
echo "<hr>";
}

?>

	<form action="Consulta.php">

		<input type="submit" value="Ver Registros" />
	</form>
	

	</body>
</html>
