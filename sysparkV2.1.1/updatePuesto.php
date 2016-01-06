<?php

echo '<script>$(document).ready(function(){
			$(".r").html("");
		});</script>';

// variable de sesion y conexion a bd
session_start();
include('connect_mysql.php');


$estado=$_POST['estado'];
date_default_timezone_set("America/Guayaquil");
$HoraActual = date("H:i:s");


if ($estado=='libre') {
	// cuando se elige la opcion de libre obtiene la hora alamcenada en la BD y realiza los calculos

	$consulta="select * from puestoestacionamiento where IdUbicacion=".$_GET["id"];
	$resultado=$conexion->query($consulta);
	while ($fila=$resultado->fetch_assoc()) {
		$Hora_inicio=$fila['HoraEntrada'];
		$Hora_fin=$HoraActual;

		$diferencia=resta($Hora_inicio, $Hora_fin);
		$valor=Decimal("$diferencia");


		$consulta1="select * from parqueadero where IdParqueadero=". $_SESSION["IdParqueadero"];
		$resultado1=$conexion->query($consulta1);
		while ($fila1=$resultado1->fetch_assoc()) {
			if ($fila['NombreUbicacion']=='cubierto') {
				$Costo=$fila1['CubiertoParqueadero'];
			}else{
				$Costo=$fila1['SimpleParqueadero'];
			}
		}
		$CostoTotal = Multiplicacion($valor,$Costo);

		echo '<script>$(document).ready(function(){
			$(".r").append("<h3>Hora de Entrada '.$Hora_inicio.'</h3>");			
			$(".r").append("<h3>Hora de Salida '.$HoraActual.'</h3>");
			$(".r").append("<h3>Tiempo uso del Estacionamiento '.$diferencia.'</h3>");
			$(".r").append("<h3>Costo del Estacionamiento '.$Costo.'</h3>");
			$(".r").append("<h3>Costo Final '.$CostoTotal.'</h3>");
		});</script>';

	}



}else{

	$consulta = 'update puestoestacionamiento set HoraEntrada="'.$HoraActual.'" where IdUbicacion='.$_GET["id"];

	if ($resultado = $conexion->query($consulta)) {
		echo '<script>$(document).ready(function(){			
			$(".r").append("<h3>hora de Entrada '.$HoraActual.'</h3>");
		});</script>';
	}else{
    // echo "<center>No se ha actualizado el Puesto</center>";
    
	}

}

$consulta = 'update puestoestacionamiento set EstadoUbicacion="'.$_POST['estado'].'" where IdUbicacion='.$_GET["id"];
// echo "<script>console.log('$EstadoUbicacion')</script>";
// echo $consulta;


if ($resultado = $conexion->query($consulta)) {
     echo '<script>$(document).ready(function(){setTimeout(function(){$("#respuesta").modal("show");}, 0000);
     	 $(".r").append("<h3 class=\"text-info\">Puesto '.$_POST['estado'].'</h3>")

                                            setTimeout(function(){$("#respuesta").modal("hide");}, 10000);});</script>';
}else{
    // echo "<center>No se ha actualizado el Puesto</center>";
    
}



$conexion->close();

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


?>


