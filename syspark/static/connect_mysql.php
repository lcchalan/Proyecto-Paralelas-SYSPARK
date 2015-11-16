<?php 
$conexion=mysql_connect('localhost', 'root', '');
if(!$conexion){
	echo "No se puede establecer conexion".mysql_error()."</br>";
}
mysql_select_db('syspark');


function cerrarConexion(){
	global $conexion;
	mysql_close($conexion);
}
?>