<?php
	include("conecte.php");

	echo $ida=$_POST['ida'];
	echo $fec=$_POST['fec'];
	echo $hor=$_POST['hor'];
	echo $act=$_POST['act'];
	echo $com=$_POST['com'];
	echo $idp=$_POST['idp'];

	$re="INSERT INTO agendacion(idagendacion, fecha, hora, actividad, completado, idpersona)
	     VALUES ('".$ida."','".$fec."','".$hor."','".$act."','".$com."','".$idp."')";

	$re=mysqli_query($conexion,$re);
?>
