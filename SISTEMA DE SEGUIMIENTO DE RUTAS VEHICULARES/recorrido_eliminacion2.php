<?php
include("conecte.php");
$el = "DELETE FROM recorrido WHERE idrecorrido='".$_POST['idr']."'";
$el = mysqli_query($conexion, $el);
header('Location: recorrido_eliminacion.php');
?>