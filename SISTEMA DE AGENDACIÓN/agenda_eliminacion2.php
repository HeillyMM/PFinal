<?php
	include("conecte.php");

	$el="DELETE FROM agendacion WHERE idagendacion='".$_POST['ida']."'";
	$el=mysqli_query($conexion,$el);
?>
