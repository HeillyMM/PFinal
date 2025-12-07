<?php
include("conecte.php");
$el = "DELETE FROM vehiculo WHERE idvehiculo='".$_POST['idv']."'";
$el = mysqli_query($conexion, $el);
header('Location: vehiculo_eliminacion.php');
?>