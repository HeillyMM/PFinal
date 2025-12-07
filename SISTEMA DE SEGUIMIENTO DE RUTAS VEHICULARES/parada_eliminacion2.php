<?php
include("conecte.php");
$el = "DELETE FROM parada WHERE idparada='".$_POST['idp']."'";
$el = mysqli_query($conexion, $el);
header('Location: parada_eliminacion.php');
?>
