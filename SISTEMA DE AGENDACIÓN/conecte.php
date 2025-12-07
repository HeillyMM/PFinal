<?php
// codigo para la conexion a la base de datos
	$host="localhost"; // Nombre del host
	$usuario="root";  // Usuario de la base de datos
	$contraseña="";  // Contraseña de la base de datos
	$basedatos="bdagenda"; // Nombre de la base de datos
	$conexion = mysqli_connect($host,$usuario,$contraseña,$basedatos) or die("Fallo la Conexion"); // Se establece la conexion
	//fin del codigo
?>