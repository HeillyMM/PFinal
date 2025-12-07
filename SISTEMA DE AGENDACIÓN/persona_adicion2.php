<?php
	include("conecte.php");

	echo $idp=$_POST['idp'];
	echo $nom=$_POST['nom'];
	echo $pat=$_POST['pat'];
	echo $mat=$_POST['mat'];
	echo $fec=$_POST['fec'];

	$re="INSERT INTO persona(idpersona, nombre, paterno, materno, fechanacimiento)
	     VALUES ('".$idp."','".$nom."','".$pat."','".$mat."','".$fec."')";

	$re=mysqli_query($conexion,$re);
?>
