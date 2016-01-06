<?php 
	$host="localhost";
	$usuario="root";
	$password="";
	$db="syspark2";
	$conexion = new mysqli($host,$usuario,$password,$db);
	if ($conexion->connect_errno) {
    	echo "Failed to connect to MySQL: (" . $conexion->connect_errno.")". $conexion->connect_error;
	}else{
		// echo 'Conexion Exitosa';
	}
?>