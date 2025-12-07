<?php
	include("conecte.php");

	$m="UPDATE agendacion 
	    SET fecha='".$_POST['fec']."',
	        hora='".$_POST['hor']."',
	        actividad='".$_POST['act']."',
	        completado='".$_POST['com']."',
	        idpersona='".$_POST['idp']."'
	    WHERE idagendacion='".$_POST['ida']."'";

	$m=mysqli_query($conexion,$m);
?>
