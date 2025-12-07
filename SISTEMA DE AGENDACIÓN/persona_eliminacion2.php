<?php
	include("conecte.php");

	$el="DELETE FROM persona WHERE idpersona='".$_POST['idp']."'";
	$el=mysqli_query($conexion,$el);
?>
