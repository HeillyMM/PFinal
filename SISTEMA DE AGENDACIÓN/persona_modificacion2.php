<?php
	include("conecte.php");

	$m="UPDATE persona 
	    SET nombre='".$_POST['nom']."',
	        paterno='".$_POST['pat']."',
	        materno='".$_POST['mat']."',
	        fechanacimiento='".$_POST['fec']."'
	    WHERE idpersona='".$_POST['idp']."'";

	$m=mysqli_query($conexion,$m);
?>
